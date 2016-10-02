<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\FormatFile;
use App\Model\AnnexedFile;
use App\Model\FlowChartFile;
use App\Model\ProcedureDocument;
use Illuminate\Http\Request;
use App\Model\TechnicianProcedure;
use App\Model\AdministrativeProcedure;
use Illuminate\Support\Facades\Storage;


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
     */
    public function uploadFile(Request $request, $procedure)
    {
        $procedureType = $request->input('procedure');

        $procedure = $this->getProcedureByType($procedureType,$procedure);

        $attached = $procedure->addFilesToProcedure($request);

        if(!$attached){
            return response('Este procedimiento ya tiene asociado un documento de este tipo. Si quiere agregar otro elimine el existente.',500);
        }

    }

    public function deleteAnnexedFile($procedure,AnnexedFile $annexedFile,$type)
    {
        $procedure = $this->getProcedureByType($type,$procedure);

        $procedure->annexedFiles()->detach($annexedFile);

        $annexedFile->delete();

        Storage::delete($procedure->getAnnexedFilesDirPath().$annexedFile->originalName);
    }

    public function deleteFormatFile($procedure,FormatFile $formatFile,$type)
    {
        $procedure = $this->getProcedureByType($type,$procedure);

        $procedure->formatFiles()->detach($formatFile->id);

        $formatFile->delete();

        Storage::delete($procedure->getFormatFilesDirPath().$formatFile->originalName);
    }

    public function deleteFlowChartFile(AdministrativeProcedure $procedure,FlowChartFile $flowChartFile)
    {
        $procedure->flowChartFile()->dissociate();

        $procedure->save();

        /*$flowChartFile->delete();*/

        /*Storage::delete('/archivos/procedimientos/administrativos/flujograma/'.$flowChartFile->originalName);*/
    }

    public function deleteProcedureFile($procedure,ProcedureDocument $procedureFile, $type)
    {
        $procedure = $this->getProcedureByType($type,$procedure);

        $procedure->procedureFile()->dissociate();

        $procedure->save();

        $procedureFile->delete();

        Storage::delete($procedure->getProcedureFileDirPath().$procedureFile->originalName);
    }
    
    public function getAllAnnexedFiles($procedure,$type)
    {
        $procedure = $this->getProcedureByType($type,$procedure);

        return $procedure->annexedFiles()->get();

    }

    public function getAllFormatsFiles($procedure,$type)
    {
        $procedure = $this->getProcedureByType($type,$procedure);

        return $procedure->formatFiles()->get();

    }

    public function getProcedureFile($procedure,$type)
    {
        $procedure = $this->getProcedureByType($type,$procedure);

        return $procedure->procedureFile()->get();
    }

    public function getFlowCharFileFiles(AdministrativeProcedure $procedure)
    {
        return $procedure->flowChartFile()->get();
    }

    private function getProcedureByType($type,$id){
        if($type == 1){
            return AdministrativeProcedure::findOrFail($id);
        }
        return TechnicianProcedure::findOrFail($id);
    }

}
