<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\CustomerType;
use App\Model\Material;
use App\Model\Plant;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::fetchAll();
        return view('plants.plants_index',compact('plants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plants.plants_create');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        Plant::createPlant($request->all());
        return redirect('/equipos');
    }

    public function edit($slug)
    {
        $plants = Plant::where('slug',$slug)->first();
        return view('plants.plants_edit',compact('plants'));
    }

    public function update(Request $request, Plant $equipo)
    {

        $equipo->update($request->all());
        return redirect('/equipos');
    }

    public function destroy(Plant $equipos)
    {
        $equipos->delete();
    }

    protected function validator(array $data, $id=null)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'brand' => 'required|max:255',
            'model' => 'required|max:255'
        ]);

    }
}
