<?php

namespace App\Http\Controllers;

use App\Model\Service;
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

        $laboratory = new Laboratory();

        $techproceds = $techproceds->groupBy('laboratory_id')->toarray();

        return view('mainlist.main_list', compact('adminproceds','techproceds','laboratory'));
    }

    public function solicitudes(){
        $solicitudes = Service::all();
        return view('applications.index', compact('solicitudes'));
    }

}
