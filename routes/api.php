<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login',function(Request $request){
    $credencial = $request->validate([
         'email'=>'required|email',
         'password'=>'required',
    ]);
    if (!Auth::attempt($credencial)) {
        return response()->json(['message'=>'Credencial Invalidada'],401);
    }
    $user = Auth::user();
    $token = $user->createToken('API Token')->plainTextToken;
    return response()->json(['token'=>$token]);
 });

Route::middleware("auth:sanctum")->group(function(){
    Route::apiResource("pedidos",PedidoController::class);
    Route::apiResource("produtos",ProdutoController::class);
});
//Route::get("/show/{produto}",[ProdutoController::class,"show"]);
//Route::post("/update/{produto}",[ProdutoController::class,"update"]);