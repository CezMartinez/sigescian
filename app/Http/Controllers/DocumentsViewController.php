<?php

namespace App\Http\Controllers;

use App\Model\AnnexedFile;
use App\Model\FlowChartFile;
use App\Model\FormatFile;
use App\Model\ProcedureDocument;


class DocumentsViewController extends Controller
{
    public function show($type)
    {
        $files = $this->selectFiles($type);
        $view = $this->selectView($type,$files);

        return $view;
    }

    public function selectView($type,$files)
    {
        switch ($type){
            case "anexos":
                return view("documents.annexed_files",compact('files'));
                break;
            case "formatos":
                return view("documents.format_files",compact('files'));
                break;
            case "procedimiento":
                return view("documents.procedure_files",compact('files'));
                break;
            default:
                abort(401,"Este tipo de archivo no existe");
        }
    }

    public function selectFiles($type)
    {
        switch ($type){
            case "anexos":
                return AnnexedFile::with('administrativeProcedure','technicianProcedure')->get();
                break;
            case "formatos":
                return FormatFile::with('administrativeProcedure','technicianProcedure')->get();
                break;
            case "procedimiento":
                return ProcedureDocument::with("administrativeProcedure","technicianProcedure")->get();
                break;
            default:
                abort(401,"Este tipo de archivo no existe");
        }
    }
}
