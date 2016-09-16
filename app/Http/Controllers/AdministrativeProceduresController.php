<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Model\AdministrativeProcedure;


class AdministrativeProceduresController extends Controller
{
    public function index()
    {
        return view('procedures.administrative.administrative_index');   
    }

    public function create()
    {
        return view('procedures.administrative.administrative_create');
    }

    public function edit(AdministrativeProcedure $procedure)
    {
        return view('procedures.administrative.administrative_edit',compact('procedure'));
    }

    public function show(AdministrativeProcedure $procedure)
    {
        return view('procedures.administrative.administrative_show',compact('procedure'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    public function update(Request $request,AdministrativeProcedure $procedure)
    {
        dd($request->all());
    }

    public function changeStatus(Request $request,AdministrativeProcedure $procedure)
    {
        dd($procedure);
    }
}
