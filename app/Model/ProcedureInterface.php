<?php

namespace App\Model;


use Illuminate\Http\Request;

interface ProcedureInterface
{
    public function addFilesToProcedure(Request $request);
    public function annexedFiles();
    public function formatFiles();
    public function procedureDocument();
    public function getFormatFilesDirPath();
    public function getAnnexedFilesDirPath();
    public function getProcedureFileDirPath();
    public function countAllProcedures();
}