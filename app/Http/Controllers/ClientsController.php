<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::all();
        $user = Auth::user();

        return view("clients.index", [
            'client' => $client,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // declarar variables.
        $fullname = $request->input('fullname');
        $address = $request->input("address");
        $phone = $request->input("phone");
        $user = Auth::user();
        $user_id = $user->id;

        // decrar objeto.
        $client = new Client();

        // instanciar objeto. 
        $client->fullname = $fullname;
        $client->address = $address;
        $client->phone = $phone;
        $client->users_id = $user_id;

        // var_dump($client);
        // die();

        // guardar en DDBB.
        $client->save();

        // redirecionar.
        return redirect()->route('clients.index')->with(['message' => 'Cliente agregad@ con exito']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // instanciar objeto.
        $client = Client::find($id);

        // sacar vista con el objeto.
        return view('clients.edit', [
            "client" => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fullname = $request->input('fullname');
        $address = $request->input("address");
        $phone = $request->input("phone");
        $user = Auth::user();
        $user_id = $user->id;

        // decrar objeto.
        $client = new Client();

        // instanciar objeto. 
        $client->fullname = $fullname;
        $client->address = $address;
        $client->phone = $phone;
        $client->users_id = $user_id;

        if ($user->id == $client->users_id) {
            DB::table('clients')
                ->where('id', $id)
                ->update([
                    'fullname' => $fullname,
                    'address' => $address,
                    'phone' => $phone,
                    'users_id' => $user_id
                ]);
        }

        return redirect()->route('clients.index')->with(['message' => 'cliente actualizado con exito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $client = Client::find($id);

        if ($user->id == $client->users_id) {
            $client->delete();
        }

        return redirect()->route('clients.index')->with(['message' => 'Cliente eliminado con exito']);
    }
}
