<?php

use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\ZakatItemController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\MosqueController;

use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'books', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [BookController::class, 'index']);
    Route::post('add', [BookController::class, 'add']);
    Route::get('edit/{id}', [BookController::class, 'edit']);
    Route::post('update/{id}', [BookController::class, 'update']);
    Route::delete('delete/{id}', [BookController::class, 'delete']);
});
Route::group(['prefix' => 'zakatitems', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [ZakatItemController::class, 'index']);
    Route::post('add', [ZakatItemController::class, 'add']);
    Route::get('edit/{id}', [ZakatItemController::class, 'edit']);
    Route::post('update/{id}', [ZakatItemController::class, 'update']);
    Route::delete('delete/{id}', [ZakatItemController::class, 'delete']);
});
Route::middleware('auth:sanctum')->group( function () {
    Route::post('/mosque',  [MosqueController::class, 'index' ]);
    Route::put('/mosque{id}',  [MosqueController::class, 'update' ]);
    Route::delete('/mosque{id}',  [MosqueController::class, 'destroy' ]);
    Route::post('/blogs',  [BlogController::class, 'store' ]);
    Route::put('/blogs{id}',  [BlogController::class, 'update' ]);
    Route::delete('/blogs{id}',  [BlogController::class, 'destroy' ]);
    

});

    Route::get('/mosque',  [MosqueController::class, 'index' ]);
    Route::get('/mosque/{id}',  [MosqueController::class, 'show' ]);
    Route::get('/blogs',  [BlogController::class, 'index' ]);
    Route::get('/blogs/{id}',  [ZakatItemController::class, 'show' ]);
  
    
    