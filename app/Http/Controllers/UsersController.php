<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        return view('user.index', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input("email");

        $user_auth = Auth::user();

        $user = new User();

        // instanciar objeto. 
        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;

        // var_dump($user);
        // die();

        if ($user_auth) {
            DB::table('users')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'surname' => $surname,
                    'email' => $email
                ]);
        }

        return redirect()->route('user.index')->with(['message' => 'Datos actualizados con exito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
