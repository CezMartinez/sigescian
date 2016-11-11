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

        $procedure = $this->getProcedureByType($procedureType, $procedure);

        $answer = $procedure->addFilesToProcedure($request);

        return response($answer['message'], $answer['status']);

    }

    public function deleteAnnexedFile($procedure, AnnexedFile $annexedFile, $type)
    {
        return $this->deleteFile($type,$annexedFile,$procedure,"AnnexedFile");
    }

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
        $procedure = $this->getProcedureByType($type, $procedure);

        $procedure->procedureDocument()->dissociate();

        $procedure->save();


    }

    public function getAllAnnexedFiles($procedure, $type)
    {
        $procedure = $this->getProcedureByType($type, $procedure);

        return $procedure->annexedFiles()->get();

    }

    public function getAllFormatsFiles($procedure, $type)
    {
        $procedure = $this->getProcedureByType($type, $procedure);

        return $procedure->formatFiles()->orderBy('owner','desc')->get();

    }

    public function getProcedureFile($procedure, $type)
    {
        $procedure = $this->getProcedureByType($type, $procedure);

        return $procedure->procedureDocument()->get();
    }

    public function getFlowCharFileFiles(AdministrativeProcedure $procedure)
    {
        return $procedure->flowChartFile()->get();
    }

    private function getProcedureByType($type, $id)
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

    private function procedureOwnerOfFile($type_of_procedure,$name_of_file,$type_of_file)
    {

        $method = $this->procedureMethod($type_of_procedure);

        switch ($type_of_file){
            case "FormatFile":
                return FormatFile::with([$method=>function($query){
                    $query->where('owner',true);
                }])->where('title',$name_of_file)->first();
                break;
            case "AnnexedFile":
                return AnnexedFile::with([$method=>function($query){
                    $query->where('owner',true);
                }])->where('title',$name_of_file)->first();
                break;
            default:
                return null;
        }
    }

    private function procedureMethod($type)
    {
        return ($type == 1) ? "administrativeProcedure":"technicianProcedure";
    }

    private function deleteFile($type,$file,$procedure,$class)
    {
        $method = $this->procedureMethod($type);

        $procedureOwner = $this->procedureOwnerOfFile($type,$file->title,$class);

        $procedure = $this->getProcedureByType($type, $procedure);

        if($procedureOwner->$method->first()->id == $procedure->id){
            $proceduresToDetach = $file->$method()->get();
            foreach ($proceduresToDetach as $procedure){
                $file->$method()->detach($procedure->id);
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
