<?php

namespace App\Http\Controllers;

use App\Model\Activity;
use App\Model\CustomerType;
use App\Model\ExternalDosimetry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationExternalDosimetryController extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = ExternalDosimetry::fetchAll();
        return view('applications.dosimetry.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = CustomerType::orderBy('id','asc')->pluck('name', 'id');
        $actividad = Activity::pluck('name','id');
        return view('applications.dosimetry.create_dosimetry',compact('types','actividad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['state']=0;
        $tipo = CustomerType::findOrFail($request->input('customer_id'));
        $activi = Activity::findOrFail($request->input('activity_id'));

        if(!$request->has('pd')){
            $request['pd_number']=null;
        }
        if(!$request->has('anillo')){
            $request['anillo_number']=null;
        }
        $request['state']=false;
        flash('Solicitud Registrada', 'success');
        $apply = ExternalDosimetry::createSolicitude($request->all(),$tipo, $activi);
        Mail::queue('applications.dosimetry.email_dosimetry', ['apply'=>$apply,'tipo'=>$tipo,'activi'=>$activi], function ($mail) use ($apply) {
            $mail->to($apply->email)
                ->from('servicioscianfia@gmail.com', 'Solicitud de Dosimetria Personal Externa')
                ->subject('Servicio de Dosimetria Personal Externa');
        });
        return redirect("/servicios/control-de-calidad/");
        //return redirect("/servicios/dosimetria-personal-externa/");
    }

    public function confirmar($id){
        $apply = ExternalDosimetry::findOrFail($id);
        $cadena="Servicio de Dosimetria Personal Externa";
        return view('applications.confirm',compact('cadena','apply'));
    }

    public function aceptar($id){
        $apply = ExternalDosimetry::findOrFail($id);
        $apply['state']=1;
        $apply->update();
        return view('applications.response');
    }
    public function rechazar($id){
        $apply = ExternalDosimetry::findOrFail($id);
        $apply['state']=2;
        $apply->update();
        return view('applications.response');
    }

}
