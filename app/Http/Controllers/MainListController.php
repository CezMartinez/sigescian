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

        $labs = Laboratory::fetchAll();
        //dd($formats);

        foreach ($techproceds as $lab)
        {
            foreach ($lab->laboratory as $l){
                echo $l;
            }

        }
        //dd($labs);



        return view('mainlist.main_list', compact('adminproceds','techproceds','labs'));
    }

}
