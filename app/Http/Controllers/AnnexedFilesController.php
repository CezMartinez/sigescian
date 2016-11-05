<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\FormatFile;
use App\Model\AnnexedFile;
use App\Model\FlowChartFile;
use App\Model\ProcedureDocument;
use File;
use Illuminate\Http\Request;
use App\Model\TechnicianProcedure;
use App\Model\AdministrativeProcedure;
use Illuminate\Support\Facades\Storage;
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
        $procedure = $this->getProcedureByType($type, $procedure);

        $procedure->annexedFiles()->detach($annexedFile);

        /*$annexedFile->delete();

        Storage::delete($procedure->getAnnexedFilesDirPath() . $annexedFile->originalName);*/
    }

    public function deleteFormatFile($procedure, FormatFile $formatFile, $type)
    {

        $procedure = $this->getProcedureByType($type, $procedure);

        $procedure->formatFiles()->detach($formatFile->id);

        /*$formatFile->delete();*/

        /*Storage::delete($procedure->getFormatFilesDirPath() . $formatFile->originalName);*/
    }

    public function deleteFlowChartFile(AdministrativeProcedure $procedure, FlowChartFile $flowChartFile)
    {
        $procedure->flowChartFile()->dissociate();

        $procedure->save();

        /*$flowChartFile->delete();*/

        /*Storage::delete('/archivos/procedimientos/administrativos/flujograma/'.$flowChartFile->originalName);*/
    }

    public function deleteProcedureFile($procedure, ProcedureDocument $procedureDocument, $type)
    {
        //dd($procedure,$procedureDocument,$type);

        $procedure = $this->getProcedureByType($type, $procedure);

        $procedure->procedureDocument()->dissociate();

        $procedure->save();

        /*$procedureDocument->delete();*/

        /*Storage::delete($procedure->getProcedureFileDirPath() . $procedureDocument->originalName);*/
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
            return AdministrativeProcedure::findOrFail($id);
        }
        return TechnicianProcedure::findOrFail($id);
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

    

}
