<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Table;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Menu;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $table = Table::all();
        $menu = Menu::all();
        $user = Auth::user();

        return view('tables.index', [
            'table' => $table,
            'menu' => $menu,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::all();
        $menu = Menu::all();
        $user = Auth::user();
        $table = Table::all();

        return view('tables.add', [
            'client' => $client,
            'menu' => $menu,
            'user' =>  $user,
            'table' => $table
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $table = new Table();
        $name = $request->input('name');
        $client_id = $request->input('client');
        $menu_id = $request->input('menu_id');
        $users = Auth::user();

        $table->name = $name;
        $table->clients_id = $client_id;
        $table->users_id = $users->id;
        $table->menus_id = $menu_id;

        // var_dump($table);
        // die();

        // guardar en DDBB.
        $table->save();

        // redirecionar.
        return redirect()->route('table.index')->with(['message' => 'reservacion agregada con exito']);
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
    public function edit($id)
    {
        $client = Client::all();
        $menu = Menu::all();
        $user = Auth::user();
        $table = Table::find($id);

        return view('tables.edit', [
            'client' => $client,
            'table' => $table,
            'menu' => $menu,
            'user' =>  $user

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $table = new Table();
        $name = $request->input('name');
        $client_id = $request->input('client');
        $menu_id = $request->input('menu_id');
        $users = Auth::user();

        $table->name = $name;
        $table->clients_id = $client_id;
        $table->users_id = $users->id;
        $table->menus_id = $menu_id;

        if ($users->id == $table->users_id) {
            DB::table('tables')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'clients_id' => $client_id,
                    'users_id' => $users->id,
                    'menus_id' => $menu_id
                ]);
        } else {

            // redirecionar.
            return redirect()->route('table.index')->with(['message' => 'no se pudo actualizar registros por favor intente mas tarde']);
        }

        // redirecionar.
        return redirect()->route('table.index')->with(['message' => 'reservacion actualizada con exito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $table = Table::find($id);

        if ($user->id == $table->users_id) {
            $table->delete();
        } else {
            return redirect()->route('table.index')->with(['message' => 'datos guardados en reguistros posteriores no se puede elinimar']);
        }

        return redirect()->route('table.index')->with(['message' => 'mesa eliminado con exito']);
    }
}
