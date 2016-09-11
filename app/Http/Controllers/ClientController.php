<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\CustomerType;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::fetchAll();
        return view('clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = CustomerType::pluck('name','id')->toArray();
        return view('clients.create',compact('types'));
    }

    public function edit($slug)
    {
        $types = CustomerType::pluck('name','id')->toArray();
        $clients = Client::where('slug',$slug)->first();
        return view('clients.edit',compact('clients','types'));
    }
}
