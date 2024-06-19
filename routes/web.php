<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Bill;
use App\Models\Table;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// vistas de usuario
Route::get('/user/view', [UsersController::class, 'index'])->name('user.index');


// agregando CRUD para menus
Route::get('/menu/index', [MenusController::class, 'index'])->name('menu.index');

Route::get('/menu/add', [MenusController::class, 'create'])->name('menu.add');

Route::post('/menu/store', [MenusController::class, 'store'])->name('menu.store');

Route::get('/menu/edit/{id}', [MenusController::class, 'edit'])->name('menu.edit');

Route::post('/menu/update/{id}', [MenusController::class, 'update'])->name('menu.update');

Route::get('/menu/destroy/{id}', [MenusController::class, 'destroy'])->name('menu.destroy');















// para pruebas.
    // $table = Table::all();
    // foreach ($table as $tables) {
    //     // echo $tables;
    //     echo $tables->name;
    //     // echo $tables->users->name . ' ' . $tables->users->surname;
    //     echo $tables->clients->fullname;
    // }

    // var_dump($table);


    // $bill = Bill::all();
    // foreach ($bill as $bills) {
    //     echo $bills->clients->fullname;
    //     echo $bills->menus->name;
    //     echo $bills->users->name;
    // }

    // $client = Client::all();

    // foreach ($client as $clients) {
    //     echo $clients->fullname;
    //     echo $clients->address;
    //     echo $clients->phone;
    //     echo $clients->users->name;
    // }

    // var_dump($client);
    // die();
