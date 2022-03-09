<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Ruta para el frontend de productos
Route::get('/', [FrontendController::class, 'index']);

// Rutas para la autenticación
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Rutas con restricción de inicio de sesión
Route::middleware(['auth:sanctum'])->group( function () {
  
  // Rutas para las categorías
  Route::get('categorias', [CategoryController::class, 'index']);
  Route::post('categorias', [CategoryController::class, 'store']);
  Route::get('categorias/{category}', [CategoryController::class, 'show']);
  Route::put('categorias/{category}', [CategoryController::class, 'update']);
  Route::delete('categorias/{category}', [CategoryController::class, 'destroy']);

  // Rutas para los productos
  Route::get('productos', [ProductController::class, 'index']);
  Route::post('productos', [ProductController::class, 'store']);
  Route::get('productos/{product}', [ProductController::class, 'show']);
  Route::put('productos/{product}', [ProductController::class, 'update']);
  Route::delete('productos/{product}', [ProductController::class, 'destroy']);
});
