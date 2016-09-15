<?php

namespace App\Http\Controllers;

use App\Model\Client;
use App\Model\CustomerType;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Client::fetchAll();
        return view('clients.clients_index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = CustomerType::pluck('name','id')->toArray();
        return view('clients.clients_create',compact('types'));
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        if (Client::exists($request->input('name'))) {
            flash('El cliente '.$request->input('name').' ya existe', 'danger');

            return back()->withInput();
        }

        Client::createNewClient($request->all());

        flash('Cliente Guardado', 'success');

        return redirect('/clientes');
    }

    public function edit($slug)
    {
        $types = CustomerType::pluck('name','id')->toArray();
        $clients = Client::where('slug',$slug)->first();
        return view('clients.clients_edit',compact('clients','types'));
    }

    public function update(Request $request, Client $cliente)
    {
        $cliente = $cliente->fill($request->all());
        $this->validator($request->all())->validate();

        if($cliente->getOriginal('slug') == $cliente->getAttribute('slug')){
            $cliente->update($request->all());
        }
        else {
            if ($cliente->exists($request->input('name'))) {
                flash('El cliente '.$request->input('name').' ya existe', 'danger');

                return back()->withInput();
            }
            flash('Cliente Actualizado', 'success');
            $cliente->update($request->all());
        }
        return redirect('/clientes');
    }

    public function destroy(Request $request,Client $cliente)
    {
        $wasDeleted = $cliente->delete();
        if($request->ajax()){
            if($wasDeleted){
                return response("El Cliente: {$cliente->name} fue eliminado",200);
            }else{
                return response("No fue eliminado.",404);
            }
        }

    }

    protected function validator(array $data, $id=null)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'slug' => 'max:255',
            'address' => 'required|max:255',
            'nit'=>'required|max:17',
            'legal_agent' =>'max:255',
        ]);

    }
}
