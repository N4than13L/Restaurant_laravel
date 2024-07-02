<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;
use App\Models\Client;
use App\Models\Menu;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bill = Bill::all();
        $user = Auth::user();

        return view('bills.index', [
            'bill' => $bill,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bill = Bill::all();
        $client = Client::all();
        $menu = Menu::all();

        return view('bills.add', [
            'bill' => $bill,
            'client' => $client,
            'menu' => $menu
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // declarar variables.
        $client_id = $request->input('client_id');
        $menu_id = $request->input("menu_id");
        $user = Auth::user();
        $user_id = $user->id;

        // decrar objeto.
        $bill = new Bill();

        // instanciar objeto. 
        $bill->menus_id = $menu_id;
        $bill->clients_id = $client_id;
        $bill->users_id = $user_id;

        // guardar en DDBB.
        $bill->save();

        // redirecionar.
        return redirect()->route('bills.index')->with(['message' => 'Comida agregada conexito']);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bill = Bill::find($id);
        $menu = Menu::all();
        $client = Client::all();

        return view('bills.edit', [
            'bill' => $bill,
            'menu' => $menu,
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // declarar variables.
        $client_id = $request->input('client_id');
        $menu_id = $request->input("menu_id");
        $user = Auth::user();
        $user_id = $user->id;

        // decrar objeto.
        $bill = new Bill();

        // instanciar objeto. 
        $bill->menus_id = $menu_id;
        $bill->clients_id = $client_id;
        $bill->users_id = $user_id;

        if ($user->id == $bill->users_id) {
            DB::table('clients')
                ->where('id', $id)
                ->update([
                    'clients_id' => $client_id,
                    'menus_id' => $menu_id,
                    'users_id' => $user_id
                ]);
        }

        // redirecionar.
        return redirect()->route('bills.index')->with(['message' => 'factura editada con exito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        $bill = Bill::find($id);

        if ($user->id == $bill->users_id) {
            $bill->delete();
        }

        return redirect()->route('bills.index')->with(['message' => 'factura eliminada con exito']);
    }
}
