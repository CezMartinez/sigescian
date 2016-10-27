<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Model\AdministrativeProcedure;
use App\Model\TechnicianProcedure;



class MainListController extends Controller
{
    public function showAll(){

        $status = request()->exists('inactivos') ? '0' : '1';

        $techproceds = TechnicianProcedure::fetchAll();
        $adminproceds = AdministrativeProcedure::fetchAllProceduresByState($status);


        return view('mainlist.main_list', compact('adminproceds','techproceds'));
    }

    public function solicitudes(){

        return view('applications.index');
    }
}
