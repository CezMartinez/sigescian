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
     * @param AdministrativeProcedure $procedure
     */
    public function uploadFile(Request $request, $procedure)
    {
        $procedureType = $request->input('procedure');

        $procedure = $this->getProcedureByType($procedureType,$procedure);

        $procedure->attachFiles($request);

    }

    public function deleteAnnexedFile(AdministrativeProcedure $procedure,AnnexedFile $annexedFile)
    {
        $procedure->annexedFiles()->detach($annexedFile->id);

        $annexedFile->delete();

        Storage::delete('/archivos/procedimientos/administrativos/anexos/'.$annexedFile->originalName);
    }
    public function deleteFormatFile(AdministrativeProcedure $procedure,FormatFile $formatFile)
    {
        $procedure->formatFiles()->detach($formatFile->id);

        $formatFile->delete();

        Storage::delete('/archivos/procedimientos/administrativos/formatos/'.$formatFile->originalName);
    }
    public function deleteFlowChartFile(AdministrativeProcedure $procedure,FlowChartFile $flowChartFile)
    {

        $procedure->flowChartFile()->dissociate();

        $procedure->save();

        $flowChartFile->delete();

        Storage::delete('/archivos/procedimientos/administrativos/flujograma/'.$flowChartFile->originalName);
    }
    
    public function getAllAdministrativeAnnexedFiles(AdministrativeProcedure $procedure){

      return $procedure->annexedFiles()->get();

    }

    public function getAllAdministrativeFormatsFiles(AdministrativeProcedure $procedure){

        return $procedure->formatFiles()->get();

    }
    public function getAllTechnicianAnnexedFiles(TechnicianProcedure $procedure){

      return $procedure->annexedFiles()->get();

    }

    public function getAllTechnicianFormatsFiles(TechnicianProcedure $procedure){

        return $procedure->formatFiles()->get();

    }

    public function getFlowCharFileFiles(AdministrativeProcedure $procedure){

        return $procedure->flowChartFile()->get();

    }

    private function getProcedureByType($type,$id){
        if($type == 1){

            return AdministrativeProcedure::findOrFail($id);

        }

        return TechnicianProcedure::findOrFail($id);
    }

}
