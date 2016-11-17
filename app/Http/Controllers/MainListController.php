<?php

namespace App\Http\Controllers;

use App\Model\Service;
use JavaScript;
use App\Http\Requests;

use App\Model\AdministrativeProcedure;
use App\Model\TechnicianProcedure;
use App\Model\Laboratory;


class MainListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function searchProcedure(){
        $search = request()->get('search');

        if ($search!=''){

                $administrativo = AdministrativeProcedure::with(['flowChartFile','annexedFiles','formatFiles','section','subSections'])
                    ->where('name','like','%'.$search.'%')
                    ->orWhere('code','like','%'.$search.'%')->first();
                $tecnico = TechnicianProcedure::with(['procedureDocument','annexedFiles','section'])
                    ->where('name','like','Procedimiento Técnico De '.$search.'%')
                    ->orWhere('code','like','%'.$search.'%')->first();

                if($tecnico){
                    JavaScript::put([
                        'name_tecnico' => $tecnico->name,
                        'id_tecnico' => $tecnico->id,
                        'url_type' => 'tecnico'
                    ]);
                    $procedures = TechnicianProcedure::where('id','<>',$tecnico->id)->pluck('name','id');
                    return view('procedures.technician.technician_show',compact('tecnico','procedures'));
                }
                elseif($administrativo){
                    JavaScript::put([
                        'name_administrative' => $administrativo->name,
                        'id_administrative' => $administrativo->id,
                        'url_type' => 'administrativo'
                    ]);
                    $procedures = AdministrativeProcedure::where('id','<>',$administrativo->id)->pluck('name','id');
                    return view('procedures.administrative.administrative_show',compact('administrativo','procedures'));
                }else{
                    return redirect('listaMaestra')->with('status','No se encontro el procedimiento');
                }
        }
        else{
                echo 'NO HAY NADA!';
        }

    }

    public function manual(){
        return view('global.manual');

    }

}
