<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\ApplicationRadio226;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicationRadio226Controller extends Controller
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
        $applications = ApplicationRadio226::fetchAll();
        return view('applications.radio226.index',compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applications.radio226.create_radio');
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
        if($request->input('samples')==null){
            $request['samples']=null;
        }
        if($request->input('liters')==null){
            $request['liters']=null;
        }
        if($request->input('gallons')==null){
            $request['gallons']=null;
        }

        flash('Solicitud Registrada', 'success');
        $apply=ApplicationRadio226::createSolicitude($request->all());
        Mail::queue('applications.radio226.email_radio', ['apply'=>$apply], function ($mail) use ($apply) {
            $mail->to($apply->email)
                ->from('servicioscianfia@gmail.com', 'Solicitud de Servicio de Analisis de Agua Radio 226')
                ->subject('Servicio de Analisis de Agua Radio 226');
        });
        return redirect("/servicios/radio-agua-226/");
    }

}
