<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Laboratory;
use App\Model\Material;
use Illuminate\Http\Request;
use Validator;

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
        $lab = Laboratory::pluck('name','id');
        return view('materials.materials_create', compact('lab'));
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        if(Material::exists($request->input('name'))){
            flash('El material '.$request->input('name').' ya existe', 'danger');
            return back()->withInput();
        }
        $laboratorio= Laboratory::findOrFail($request->input('laboratory_id'));
        flash('Material '.$request->input('name').' creado correctamente', 'success');
        Material::createMaterial($request->all(), $laboratorio);

        return redirect('/materiales');
    }


    public function edit($slug)
    {
        $materials = Material::where('slug',$slug)->first();
        $lab = Laboratory::pluck('name','id');
        return view('materials.materials_edit',compact('materials', 'lab'));
    }

    public function update(Request $request, Material $materiale)
    {
        $materiale = $materiale->fill($request->all());
        $this->validator($request->all())->validate();
        if($materiale->getOriginal('slug') == $materiale->getAttribute('slug')){
            $materiale->update($request->all());
        }
        elseif ($materiale->exists($request->input('name'))) {
                flash('El material '.$request->input('name').' ya existe', 'danger');

                return back()->withInput();
            }
        $laboratorio = Laboratory::findOrFail($request->input('laboratory_id'));

        $materiale->fill($request->all())->laboratory()->dissociate();
        $materiale->laboratory()->associate($laboratorio);
        $materiale->save();
        flash('Material'.$request->input('name').' editado correctamente', 'success');
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
