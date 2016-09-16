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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $materials = Material::fetchAll();
        return view('materials.materials_index',compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materials.materials_create');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        if (Material::exists($request->input('name'))) {
            flash('El material '.$request->input('name').' ya existe', 'danger');

            return back()->withInput();
        }

        Material::createMaterial($request->all());

        flash('Material Guardado', 'success');

        return redirect('/materiales');
    }


    public function edit($slug)
    {
        $materials = Material::where('slug',$slug)->first();
        return view('materials.materials_edit',compact('materials'));
    }

    public function update(Request $request, Material $materiale)
    {
        $materiale = $materiale->fill($request->all());
        $this->validator($request->all())->validate();

        if($materiale->getOriginal('slug') == $materiale->getAttribute('slug')){
            $materiale->update($request->all());
        }
        else {
            if ($materiale->exists($request->input('name'))) {
                flash('El material '.$request->input('name').' ya existe', 'danger');

                return back()->withInput();
            }
            flash('Material actualizado', 'success');
            $materiale->update($request->all());
        }
        return redirect('/materiales');
    }

    public function destroy(Request $request, Material $materiales)
    {
        $wasDeleted = $materiales->delete();
        if($request->ajax()){
            if($wasDeleted){
                return response("El material: {$materiales->name} fue eliminado",200);
            }else{
                return response("No fue eliminado.",404);
            }
        }

    }

    protected function validator(array $data, $id=null)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

    }
}
