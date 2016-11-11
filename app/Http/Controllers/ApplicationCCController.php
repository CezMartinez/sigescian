<?php

namespace App\Http\Controllers;

use App\Model\Activity;
use App\Model\ApplicationControl;
use App\Model\CustomerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationCCController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = ApplicationControl::fetchAll();
        return  view('applications.controlc.index',compact('applications'));
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
        return view('applications.controlc.create_controlc',compact('types','actividad'));
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
        flash('Solicitud Registrada', 'success');
        $apply = ApplicationControl::createSolicitude($request->all(),$tipo, $activi);
        Mail::queue('applications.controlc.email_controlc', ['apply'=>$apply,'tipo'=>$tipo,'activi'=>$activi], function ($mail) use ($apply) {
            $mail->to($apply->email)
                ->from('servicioscianfia@gmail.com', 'Solicitud de Servicio de Control de Calidad')
                ->subject('Servicio de Control de Calidad');
        });
        return redirect("/servicios/control-de-calidad/");
    }


}
