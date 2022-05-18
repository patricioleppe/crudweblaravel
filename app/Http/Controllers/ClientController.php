<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

/* Está importando la clase Session desde el espacio de nombres Illuminate\Support\Facades. */
use Illuminate\Support\Facades\Session;

/* Extendiendo la clase Controlador. */
class ClientController extends Controller
{

    public function index()
    {
        /* Es sacar todos los clientes de la base de datos y paginarlos por 5. */
        $clients = Client::paginate(5);
        /* Está devolviendo la vista client.index y pasando la variable clients a la vista. */
        return view('client.index')->with('clients', $clients);
    }


    public function create()
    {
        /* Devolviendo la vista client.form */
        return view('client.form');
    }


    public function store(Request $request)
    {
        /* Validando la solicitud ($request) */
        $request->validate([
            'name'=>'required|max:50',
            'due'=>'required|gte:1'
        ]);

        /* Creando un nuevo cliente con los datos de la solicitud (request). */
        $client = Client::create($request->only('name','due','comments'));

        /* Crea variable de sesion llamada message con el valor 'Registro creado con exito'. */
        Session::flash('message','Registro creado con exito');

        /* Redirige al usuario a la ruta client.index. */
        return redirect()->route('client.index');

    }


    public function show(Client $client)
    {

    }


    public function edit(Client $client)
    {

        /* Returning the view client.form and passing the variable client to the view. */
        return view('client.form')->with('client',$client);
    }


    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'=>'required|max:50',
            'due'=>'required|gte:1'
        ]);

        $client->name = $request['name'];
        $client->due = $request['due'];
        $client->comments = $request['comments'];

        /* Saving the changes made to the client. */
        $client -> save();

        /* Crea variable de sesion llamada message con el valor 'Registro creado con exito'. */
        Session::flash('message','Registro actualizado con exito');

        /* Redirige al usuario a la ruta client.index. */
        return redirect()->route('client.index');


    }


    public function destroy(Client $client)
    {

        // echo $cliente;
        $client->delete();

        Session::flash('message','Registro '.$client['name'].' Eliminado.');

        return redirect()->route('client.index');
    }
}
