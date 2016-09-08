<?php

namespace App\Http\Controllers;

use App\Model\Material;
use Dotenv\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;

class MaterialController extends Controller
{
    public function index(){
        $Materials=Material::getMaterials();
        return view('material.index',compact('Materials'));
    }

    public function show(){
        return view('material.create');
    }

    protected function validator(array $data){
return Validator::make($data,[
    'materialName'=>'required|max:255',
    'materialDescription'=>'required|max:255']);
    }

    public function store(Request $request){
        //$this->validator($request);
        Material::createMaterial($request);
        return redirect()->action('MaterialController@index');
    }
}


