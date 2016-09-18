<?php

namespace App\Http\Controllers;

use App\Model\AdministrativeProcedure;
use App\Model\AnnexedFile;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;


class AnnexedFilesController extends Controller
{
    public function uploadFile(Request $request,AdministrativeProcedure $procedure)
    {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $clientName = $file->getClientOriginalName();
        $nameWithoutExtension = preg_replace('(.\w+$)','',$file->getClientOriginalName());
        $title = ucwords(preg_replace('([^A-Za-z0-9])',' ',$nameWithoutExtension));
        $mime = $file->getClientMimeType();
        $size = $file->getClientSize();

        $path = $file->storeAs(
            'archivos/procedimientos/administrativos', $clientName,'public'
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

    public function deleteFile(AdministrativeProcedure $procedure,AnnexedFile $annexedFile)
    {
        $procedure->annexedFiles()->detach($annexedFile->id);

        Storage::delete('/archivos/procedimientos/administrativos/'.$annexedFile->originalName);
    }
}
