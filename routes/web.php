<?php

use App\Http\Controllers\KitobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\TalabaController;
use App\Http\Controllers\TelefonController;
use App\Http\Controllers\UniversitetController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Check;
use Illuminate\Support\Facades\Route;

Route::get('index', function () {
    return view('index');
});
Route::get('/', function () {
    return view('index');
});
Route::get('/login',[LoginController::class,'loginpage']);
Route::get('/register',[LoginController::class,'registerpage']);
Route::post('/login',[LoginController::class,'login']);
Route::post('/register',[LoginController::class,'register']);
Route::get('/admin',[LoginController::class,'admin']);
Route::get('/logout',[LoginController::class,'logout']);

Route::post('createpost',[PostController::class,'create']);

Route::get('/users',[UserController::class,'users'])->middleware(Check::class.':admin');
Route::post('/createuser',[UserController::class,'create']);
Route::put('/updateuser/{id}',[UserController::class,'update']);

Route::get('talaba',[TalabaController::class,'talaba'])->middleware(Check::class.':admin,hr');
Route::post('createtalaba',[TalabaController::class,'create']);

Route::get('kitob',[KitobController::class,'kitob'])->middleware(Check::class.':moderator');
Route::post('createkitob',[KitobController::class,'create']);

Route::get('telefon',[TelefonController::class,'telefon'])->middleware(Check::class.':admin,bugalter');
Route::post('createtelefon',[TelefonController::class,'create']);

Route::get('universitet',[UniversitetController::class,'universitet'])->middleware(Check::class.':moderator,hr');
Route::post('createuniversitet',[UniversitetController::class,'create']);

Route::get('roles',[RoleController::class,'index'])->middleware(Check::class.':admin');
Route::post('createrole',[RoleController::class,'create']);
Route::put('updaterole/{id}',[RoleController::class,'update']);
Route::get('deleterole/{id}',[RoleController::class,'destroy']);
Route::get('isactive/{id}',[RoleController::class,'isactive']);
Route::get('noactive/{id}',[RoleController::class,'noactive']);

