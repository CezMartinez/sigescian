<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\FormatFile;
use App\Model\AnnexedFile;
use App\Model\FlowChartFile;
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

        $procedure->attachFiles($request);

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

        $flowChartFile->delete();

        Storage::delete('/archivos/procedimientos/administrativos/flujograma/'.$flowChartFile->originalName);
    }
    
    public function getAllAnnexedFiles($procedure,$type){

        $procedure = $this->getProcedureByType($type,$procedure);

        return $procedure->annexedFiles()->get();

    }

    public function getAllFormatsFiles($procedure,$type){

        $procedure = $this->getProcedureByType($type,$procedure);

        return $procedure->formatFiles()->get();

    }

    public function getFlowCharFileFiles($procedure){

        return $procedure->flowChartFile()->get();

    }

    private function getProcedureByType($type,$id){
        if($type == 1){

            return AdministrativeProcedure::findOrFail($id);

        }

        return TechnicianProcedure::findOrFail($id);
    }

}
