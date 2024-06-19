<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        $user = Auth::user();

        return view("menus.index", [
            'menus' => $menus,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("menus.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // declarar variables.
        $name = $request->input('name');
        $amount = $request->input("amount");
        $user = Auth::user();
        $user_id = $user->id;

        // decrar objeto.
        $menu = new Menu();

        // instanciar objeto. 
        $menu->name = $name;
        $menu->amount = $amount;
        $menu->users_id = $user_id;

        // guardar en DDBB.
        $menu->save();

        // redirecionar.
        return redirect()->route('menu.index')->with(['message' => 'Comida agregada conexito']);
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
        // instanciar objeto.
        $menu = Menu::find($id);

        // sacar vista con el objeto.
        return view('menus.edit', [
            "menu" => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->input('name');
        $amount = $request->input("amount");
        $user = Auth::user();
        $user_id = $user->id;

        // decrar objeto.
        $menu = new Menu();

        // instanciar objeto. 
        $menu->name = $name;
        $menu->amount = $amount;
        $menu->users_id = $user_id;

        if ($user->id == $menu->users_id) {
            DB::table('menus')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'amount' => $amount,
                    'users_id' => $user_id
                ]);
        }
        return redirect()->route('menu.index')->with(['message' => 'menu actualizado con exito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $menu = Menu::find($id);

        if ($user->id == $menu->users_id) {
            $menu->delete();
        }

        return redirect()->route('menu.index')->with(['message' => 'menu eliminado con exito']);
    }
}
