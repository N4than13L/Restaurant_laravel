<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Bill;
use App\Models\Table;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
