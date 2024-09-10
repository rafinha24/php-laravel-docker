<?php

use App\Http\Controllers\ReceitaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


 Route::apiResource('receita', ReceitaController::class );
 Route::post('/receitas', [ReceitaController::class, 'store']);

   
   