<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\ApplicationFrotis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationFrotisController extends Controller
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
        $applications = ApplicationFrotis::fetchAll();
        return view('applications.frotis_radiacion.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applications.frotis_radiacion.create_frotis');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['state']=false;
        if($request->input('frotis')==null){
            $request['frotis']=false;
        }else{
            $request['frotis']=true;
        }
        if($request->input('radiation')==null){
            $request['radiation']=false;
        }else{
            $request['radiation']=true;
        }
        flash('Solicitud Registrada', 'success');
        $apply=ApplicationFrotis::createSolicitude($request->all());
        Mail::queue('applications.frotis_radiacion.email_frotis', ['apply'=>$apply], function ($mail) use ($apply) {
            $mail->to($apply->email)
                ->from('servicioscianfia@gmail.com', 'Solicitud de Servicio de Prueba de Frotis y Radiacion')
                ->subject('Servicio de Prueba de Frotis y Radiacion');
        });
        return redirect("/servicios/frotis-radiacion/");
    }

}
