<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;




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
    // fetch all users 
    // $users = DB::select('select * from users where email = ?', ["7458vermaravi@gmail.com"]);
    $users = DB::select("select * from users");
    // dd($users);
    // create new user 
    // $user = DB::insert('insert into users(name , email, password) values (?,?,?)', [
    //     'Ravi',
    //     'ravi@gmail.com',
    //     'password'
    // ]);
    // $user = DB::insert('insert into users(name , email, password ) values(?,?,?)', [
    //     'sachin verma',
    //     'sachin@gmail.com',
    //     'password'
    // ]);
    // dd($user);
    // update user 
    // $user = DB::update("update users set email='bholuemai@gmail.com' where id=2");
    // delete the user 
    // $user = DB::delete('delete from users where id =1');


    // get data from the table 

    // $user = DB::table('users')->get();
    // $user = DB::table('users')->where('id', 3)->get();

    // create user 
    // $user = DB::table('users')->insert([
    //     'name' => "Rahul pal ",
    //     'email' => 'exampl@gmail.com',
    //     'password' => 11111
    // ]);

    // update the user 

    // $res = DB::table('users')->where('id', 2)->update([
    //     'email' => 'change22@gmail.com',
    //     'name' => 'change22'
    // ]);
    // dd($res);

    $del = DB::table('users')->where('id', 3)->delete();
    $user = DB::table('users')->get();
    dd($user);
    // return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
