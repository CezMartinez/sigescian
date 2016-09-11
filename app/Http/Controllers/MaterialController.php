<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\CustomerType;
use App\Model\Material;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::fetchAll();
        return view('materials.index',compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materials.create');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        Material::createMaterial($request->all());
        return redirect('/materiales');
    }

    public function edit($slug)
    {
        $materials = Material::where('slug',$slug)->first();
        return view('materials.edit',compact('materials'));
    }

    public function update(Request $request, Material $materiale)
    {
        $this->validator($request->all())->validate();
        $materiale->update($request->all());
        return redirect('/materiales');
    }

    public function destroy(Material $materiales)
    {
        $materiales->delete();
    }

    protected function validator(array $data, $id=null)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

    }
}
