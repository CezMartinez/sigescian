<?php

namespace App\Http\Controllers;

use App\Model\AdministrativeProcedure;
use App\Model\AnnexedFile;
use App\Model\FlowChartFile;
use App\Model\FormatFile;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;


class AnnexedFilesController extends Controller
{
    /**
     * Upload File By The type
     * type 1 = Formatos
     * type 2 = Flujogramas
     * type 3 = Anexos
     *
     * @param Request $request
     * @param AdministrativeProcedure $procedure
     */
    public function uploadFile(Request $request,AdministrativeProcedure $procedure)
    {
        $type = $request->input('type');
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $clientName = time().$file->getClientOriginalName();
        $nameWithoutExtension = preg_replace('(.\w+$)','',$file->getClientOriginalName());
        $title = ucwords(preg_replace('([^A-Za-z0-9])',' ',$nameWithoutExtension));
        $mime = $file->getClientMimeType();
        $size = $file->getClientSize();
        
        if($type == 1){//Formatos
            $path = $file->storeAs(
                'archivos/procedimientos/administrativos/formatos', $clientName,'public'
            );
            $procedure->formatFiles()->create([
                'path'                  =>$path,
                'originalName'          =>$clientName,
                'nameWithoutExtension'  =>$nameWithoutExtension,
                'title'                 =>$title,
                'extension'             =>$extension,
                'size'                  =>$size,
                'mime'                  =>$mime,
            ]);
        }elseif ($type == 2){//Flujograma
            $path = $file->storeAs(
                'archivos/procedimientos/administrativos/flujograma', $clientName,'public'
            );
            $flowchartNew = FlowChartFile::create([
                'path'                  =>$path,
                'originalName'          =>$clientName,
                'nameWithoutExtension'  =>$nameWithoutExtension,
                'title'                 =>$title,
                'extension'             =>$extension,
                'size'                  =>$size,
                'mime'                  =>$mime,
            ]);
            if($request->ajax()){
               if($procedure->flowChartFile()->get()->count()){
                   return response('Este procedimiento ya tiene flujogramas asociados. Si quiere agregar otro elimine el existente.',500);
               };
            }
            $procedure->flowChartFile()->dissociate();
            $procedure->flowChartFile()->associate($flowchartNew);
            $procedure->save();
        }else{//anexo
            $path = $file->storeAs(
                'archivos/procedimientos/administrativos/anexos', $clientName,'public'
            );
            $procedure->annexedFiles()->create([
                'path'                  =>$path,
                'originalName'          =>$clientName,
                'nameWithoutExtension'  =>$nameWithoutExtension,
                'title'                 =>$title,
                'extension'             =>$extension,
                'size'                  =>$size,
                'mime'                  =>$mime,
            ]);
        }

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
    
    public function getAllAnnexedFiles(AdministrativeProcedure $procedure){

      return $procedure->annexedFiles()->get();

    }

    public function getAllFormatsFiles(AdministrativeProcedure $procedure){

        return $procedure->formatFiles()->get();

    }

    public function getFlowCharFileFiles(AdministrativeProcedure $procedure){

        return $procedure->flowChartFile()->get();

    }

}
