<?php

namespace App\Http\Controllers;

use App\Model\ApplicationControl;
use App\Model\ApplicationFrotis;
use App\Model\ApplicationRadio226;
use App\Model\ExternalDosimetry;
use Illuminate\Http\Request;

class ClientOptionsController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function confirmarControl($id){
        $apply = ApplicationControl::findOrFail($id);
        $cadena="Servicio de Control de Calidad";
        return view('applications.confirm',compact('apply','cadena'));
    }

    public function aceptarControl($id){
        $apply = ApplicationControl::findOrFail($id);
        $apply['state']=1;
        $apply->update();
        return view('applications.response');
    }
    public function rechazarControl($id){
        $apply = ApplicationControl::findOrFail($id);
        $apply['state']=2;
        $apply->update();
        return view('applications.response');
    }

    public function confirmarDosimetria($id){
        $apply = ExternalDosimetry::findOrFail($id);
        $cadena="Servicio de Dosimetria Personal Externa";
        return view('applications.confirm',compact('cadena','apply'));
    }

    public function aceptarDosimetria($id){
        $apply = ExternalDosimetry::findOrFail($id);
        $apply['state']=1;
        $apply->update();
        return view('applications.response');
    }
    public function rechazarDosimetria($id){
        $apply = ExternalDosimetry::findOrFail($id);
        $apply['state']=2;
        $apply->update();
        return view('applications.response');
    }

    public function confirmarFrotis($id){
        $apply = ApplicationFrotis::findOrFail($id);
        $cadena="Servicio de Prueba de Frotis y Radiacion";
        return view('applications.confirm_other',compact('apply','cadena'));
    }

    public function aceptarFrotis($id){
        $apply = ApplicationFrotis::findOrFail($id);
        $apply['state']=1;
        $apply->update();
        return view('applications.response');
    }
    public function rechazarFrotis($id){
        $apply = ApplicationFrotis::findOrFail($id);
        $apply['state']=2;
        $apply->update();
        return view('applications.response');
    }

    public function confirmarRadio($id){
        $apply = ApplicationRadio226::findOrFail($id);
        $cadena="Servicio de Analisis de Agua Radio 226";
        return view('applications.confirm_other',compact('apply','cadena'));
    }

    public function aceptarRadio($id){
        $apply = ApplicationRadio226::findOrFail($id);
        $apply['state']=1;
        $apply->update();
        return view('applications.response');
    }
    public function rechazarRadio($id){
        $apply = ApplicationRadio226::findOrFail($id);
        $apply['state']=2;
        $apply->update();
        return view('applications.response');
    }
}
