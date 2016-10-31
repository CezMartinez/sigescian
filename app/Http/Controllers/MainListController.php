<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\AdministrativeProcedure;
use App\Model\TechnicianProcedure;
use App\Model\Laboratory;




class MainListController extends Controller
{
    public function showAll()
    {

        $status = request()->exists('inactivos') ? '0' : '1';

        $techproceds = TechnicianProcedure::fetchAllProcedures($status);

        $adminproceds = AdministrativeProcedure::fetchAllProcedures($status);

        //$labs = Laboratory::fetchAll();

        $laboratory = new Laboratory();



        $techproceds = $techproceds->groupBy('laboratory_id')->toarray();
        //dd($techproceds);
        //dd($techproceds,count($techproceds));



        return view('mainlist.main_list', compact('adminproceds','techproceds','laboratory'));
    }

}
