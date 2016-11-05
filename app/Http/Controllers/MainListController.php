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
/*
            $adminproceds = AdministrativeProcedure::where('name','like','%'.$search.'%')->get();

            $techproceds = TechnicianProcedure::where('name','like','%'.$search.'%')->get();

            return view('mainlist.search_list', compact('adminproceds','techproceds'));
*/

                $administrativo = AdministrativeProcedure::with(['flowChartFile','annexedFiles','formatFiles','section','subSections'])
                    ->where('name','like','%'.$search.'%')
                    ->orWhere('code','like','%'.$search.'%')->first();
                $tecnico = TechnicianProcedure::with(['procedureDocument','annexedFiles','section'])
                    ->where('name','like','Procedimiento Técnico De '.$search.'%')
                    ->orWhere('code','like','%'.$search.'%')->first();

                if($tecnico){
                    JavaScript::put([
                        'name_tecnico' => $tecnico->name,
                    ]);
                    return view('procedures.technician.technician_show',compact('tecnico'));
                }
                elseif($administrativo){
                    JavaScript::put([
                        'name_administrative' => $administrativo->name,
                    ]);
                    return view('procedures.administrative.administrative_show',compact('administrativo'));
                }else{
                    return redirect('listaMaestra')->with('status','No se encontro el procedimiento');
                }
        }
        else{
                echo 'NO HAY NADA!';
        }

    }

}
