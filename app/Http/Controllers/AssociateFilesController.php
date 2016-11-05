<?php

namespace App\Http\Controllers;

use App\Model\AdministrativeProcedure;
use App\Model\AnnexedFile;
use App\Model\FormatFile;
use App\Model\TechnicianProcedure;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class AssociateFilesController extends Controller
{
    public function getFilesByType($file_type, $procedure_type, $procedure_id)
    {
        $procedure = $this->findProcedure($procedure_type,$procedure_id);

        return $this->findFiles($file_type,$procedure);

    }

    public function associate($procedure_id, $procedure_type, $files_type, Request $request)
    {
        $ids = [];
        $identificados = [];
        $filesToAssociate = $request->input('files');
        $procedure = $this->findProcedure($procedure_type,$procedure_id);
        if(!is_null($filesToAssociate)){
            foreach ($filesToAssociate as $file_name){
                array_push($ids,$this->findIdOfFiles($files_type,$file_name));
            }

            if($files_type=="formato"){
                $count = $procedure->formatFiles()->where('format_files.id',$ids)->get()->count();
                if($count != count($ids)){
                    $guardados = $procedure->formatFiles()->get(['format_files.id']);
                    foreach ($guardados as $guardado){
                        array_push($identificados,$guardado->id);
                    }
                    $los_nuevos =  array_diff($ids,$identificados);
                    $procedure->formatFiles()->attach($los_nuevos);

                }
            }else{
                $count = $procedure->annexedFiles()->where('annexed_files.id',$ids)->get()->count();
                if($count != count($ids)){
                    $guardados = $procedure->annexedFiles()->get(['annexed_files.id']);
                    foreach ($guardados as $guardado){
                        array_push($identificados,$guardado->id);
                    }
                    $los_nuevos =  array_diff($ids,$identificados);
                    $procedure->annexedFiles()->attach($los_nuevos);

                }
            }

            return response ("Los pasos fueron asociados correctamente",200);
        }

        return response ("Tienes que seleccionar por lo menos un formato",401);
    }

    public function findProcedure($procedure_type, $procedure_id)
    {
        $procedure = null;
        if ($procedure_type == "administrativo") {
                return $procedure = AdministrativeProcedure::find($procedure_id);
        }

        return $procedure = TechnicianProcedure::find($procedure_id);
    }

    public function findFiles($file_type,$procedure)
    {

        if ($file_type == "formato") {
            return $procedure->formatFiles()->where('owner',true)->get()->pluck("title", 'id');
        }

        return $procedure->annexedFiles()->get()->pluck("title", 'id');
    }

    public function findIdOfFiles($file_type,$file_name)
    {
        if($file_type == 'formato'){
           return $file = FormatFile::where('title',$file_name)->first()->id;
        }

        return $file = AnnexedFile::where('title',$file_name)->first()->id;

    }

    public function validateFiles($data)
    {
        return Validator::make($data,[
            'files' => 'required',
        ])->validate();
    }
}
