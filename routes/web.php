<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Bill;
use App\Models\Table;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\TablesController;

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

Route::post('/user/update/{id}', [UsersController::class, 'update'])->name('user.update');
// -----------------------------------------------------------

// agregando C.R.U.D para clientes.
Route::get('/clients/index', [ClientsController::class, 'index'])->name('clients.index');

Route::get('/clients/add', [ClientsController::class, 'create'])->name('clients.create');

Route::post('/clients/store', [ClientsController::class, 'store'])->name('clients.store');

Route::get('/clients/destroy/{id}', [ClientsController::class, 'destroy'])->name('clients.destroy');

Route::get('/clients/edit/{id}', [ClientsController::class, 'edit'])->name('clients.edit');

Route::post('/clients/update/{id}', [ClientsController::class, 'update'])->name('clients.update');
// ---------------------------------------------------------------
// agregar mesas.
Route::get('/table/index', [TablesController::class, 'index'])->name('table.index');

Route::get('/table/create', [TablesController::class, 'create'])->name('table.create');

Route::post('/table/store', [TablesController::class, 'store'])->name('table.store');


// agregando C.R.U.D para menus
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
