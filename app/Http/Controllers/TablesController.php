<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Table;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $table = Table::all();
        $user = Auth::user();

        return view('tables.index', [
            'table' => $table,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = Client::all();
        $user = Auth::user();

        return view('tables.add', [
            'client' => $client,
            'user' =>  $user
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
        $menu_id = $request->input('menu');
        $users = Auth::user();


        $table->name = $name;
        $table->clients_id = $client_id;
        $table->users_id = $users;

        var_dump($table);
        die();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
