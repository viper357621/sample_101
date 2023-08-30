<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
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
    // $users = DB::select("select * from users");
    //  $users = DB::insert('insert into users (name, email, password) values (?, ?, ?)', ['Marc','me@bibi.com','password']);
    //    $users = DB::table('users')->get();

    // $users = DB::table('users')->insert([
    //     'name' => 'aw',
    //     'email' => 'aw@gmail.co',
    //     'password' => 'aw@gmail.co',
    // ]);

    // $users = User::create([
    // 'name' => 'aw',
    // 'email' => 'aw@gmail.cos',
    // 'password' => 'aw@gmail.cos',
    // ]);
    // $users = User::where('id', 2)->update(['email' => 'a@gmail.cow']);
    // $users = DB::table('users')->where('id',2)->update(['email'=>'a@gmail.co']);

    // $users = DB::table('users')->where('id',2)->update(['email'=>'a@gmail.co']);
//    $users = User::where('id',1)->first();
    // $users = User::find(2);
    // $users->update([
    //     'email'=>'aaa',
    // ]);

    // $users =User::find(2);
    // $users->delete();

    // $users = User::all();
    // dd($users);
   });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
