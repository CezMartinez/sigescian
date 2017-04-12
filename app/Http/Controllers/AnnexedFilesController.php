<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\FormatFile;
use App\Model\AnnexedFile;
use App\Model\FlowChartFile;
use App\Model\ProcedureDocument;
use DB;
use File;

use Illuminate\Http\Request;
use App\Model\TechnicianProcedure;
use App\Model\AdministrativeProcedure;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\This;
use Response;


class AnnexedFilesController extends Controller
{
    /**
     * Upload File By The typeFile
     * typeFile 1 = Formatos
     * typeFile 2 = Flujogramas
     * typeFile 3 = Anexos
     *
     * @param Request $request
     * @param $procedure
     * @return Response
     */
    public function uploadFile(Request $request, $procedure)
    {
        $procedureType = $request->input('procedure');

        $procedure = $this->findProcedureByType($procedureType, $procedure);

        $answer = $procedure->addFilesToProcedure($request);

        return response($answer['message'], $answer['status']);

    }

    public function deleteAnnexedFile($procedure, AnnexedFile $annexedFile, $type)
    {
        return $this->deleteFile($type,$annexedFile,$procedure,"AnnexedFile");
    }

    /**
     * {procedure}/{formatFile}/{type}
     * @param $procedure id of the procedure
     * @param FormatFile $formatFile id of the format
     * @param $type id of the type for administrative o tecni
     * @return string
     */
    public function deleteFormatFile($procedure, FormatFile $formatFile, $type)
    {
        return $this->deleteFile($type,$formatFile,$procedure,"FormatFile");
    }

    public function deleteFlowChartFile(AdministrativeProcedure $procedure, FlowChartFile $flowChartFile)
    {
        $procedure->flowChartFile()->dissociate();

        $procedure->save();

    }

    public function deleteProcedureFile($procedure, ProcedureDocument $procedureDocument, $type)
    {
        $procedure = $this->findProcedureByType($type, $procedure);

        $procedure->procedureDocument()->dissociate();

        $procedure->save();

    }

    public function getAllAnnexedFiles($procedure, $type)
    {
        $procedure = $this->findProcedureByType($type, $procedure);

        return $procedure->annexedFiles()->get();

    }

    public function getAllFormatsFiles($procedure, $type)
    {
        $procedure = $this->findProcedureByType($type, $procedure);

        return $procedure->formatFiles()->where('active',true)->orderBy('owner','desc')->get();

    }

    public function getProcedureFile($procedure, $type)
    {
        $procedure = $this->findProcedureByType($type, $procedure);

        return $procedure->procedureDocument()->get();
    }

    public function getFlowCharFileFiles(AdministrativeProcedure $procedure)
    {
        return $procedure->flowChartFile()->get();
    }

    private function findProcedureByType($type, $id)
    {
        if ($type == 1) {
            return AdministrativeProcedure::where('id',$id)->first();
        }
        return TechnicianProcedure::where('id',$id)->first();
    }

    public function getFile($file_type, $procedure_type, $file_name)
    {
        $file_path = "";
        /*$file_path = "storage/archivos/procedimientos/administrativos/formatos/{$file_name}";*/
        switch ($file_type) {
            case 1:
                $file_path = "storage/archivos/procedimientos/{$this->isAdministrative($procedure_type)}/formatos/{$file_name}";
                break;
            case 3:
                $file_path = "storage/archivos/procedimientos/{$this->isAdministrative($procedure_type)}/anexos/{$file_name}";
                break;
            case 2:
                $file_path = "storage/archivos/procedimientos/{$this->isAdministrative($procedure_type)}/flujograma/{$file_name}";
                break;
            case 4:
                $file_path = "storage/archivos/procedimientos/{$this->isAdministrative($procedure_type)}/procedimientos/{$file_name}";
                break;
        }

        $exists = File::exists($file_path);
        if ($exists) {
            $file = File::get($file_path);
            $mimeTyoe = File::mimeType($file_path);

            if ($mimeTyoe != "application/pdf") {
                return Response::download($file_path, $file_name);
            }

            $response = Response::make($file, 200);
            $response->header('Content-Type', 'application/pdf');

            return $response;

        }
    }

    private function isAdministrative($procedure_type)
    {
        return ($procedure_type == "1") ? "administrativos" : "tecnicos";
    }

    private function findFileWithOwner($type_of_procedure, $name_of_file, $type_of_file)
    {

        $procedureType = $this->procedureType($type_of_procedure);

        switch ($type_of_file){
            case "FormatFile":
                return FormatFile::with([$procedureType=>function($query){
                    $query->where('owner',true);
                }])->where('title',$name_of_file)->first();
                break;
            case "AnnexedFile":
                return AnnexedFile::with([$procedureType=>function($query){
                    $query->where('owner',true);
                }])->where('title',$name_of_file)->first();
                break;
            default:
                return null;
        }
    }

    private function procedureType($type)
    {
        return ($type == 1) ? "administrativeProcedure":"technicianProcedure";
    }

    /***
     * @param $type, 1  if administrativeProcedure or  =! 1 if technicianProcedure
     * @param $file,  file object
     * @param $procedure,  procedure object
     * @param $class, "FomatFile,AnnexedFile"
     * @return string
     */
    private function deleteFile($type,$file,$procedure,$class)
    {
        $procedureType = $this->procedureType($type);

        $fileWithOwner = $this->findFileWithOwner($type,$file->title,$class);

        $procedure = $this->findProcedureByType($type, $procedure);

        if($fileWithOwner->$procedureType->first()->id == $procedure->id){ // do this if the procedure is the owner of the file

            $proceduresToDetach = $file->$procedureType()->get();

            foreach ($proceduresToDetach as $procedure){

                if($procedure->getOriginal()['pivot_owner'] == 1){

                    $file->$procedureType()->updateExistingPivot($procedure->id, ['active'=>false]);

                }else{

                    $file->$procedureType()->detach($procedure->id);

                }


            }
            $procedureNames = "";

            foreach ($proceduresToDetach as $procedure){

                $procedureNames .= "\"$procedure->name\"\n ";

            }

            return "El archivo fue eliminado y se ha elimado toda relacion con los siguientes procedimientos:\n $procedureNames";
        }else{

            if($class == "FormatFile"){

                $procedure->formatFiles()->detach($file->id);

            }elseif($class == "AnnexedFile"){

                $procedure->annexedFiles()->detach($file->id);
            }

            return "El archivo fue desasociado";
        }
    }


}
