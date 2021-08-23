<?php

use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\ZakatItemController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\MosqueController;
use App\Http\Controllers\API\DonationController;
use App\Http\Controllers\API\NisabController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\ZakatRequestController;





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
    // Route::get('/', [ZakatItemController::class, 'index']);
    Route::post('add', [ZakatItemController::class, 'add']);
    Route::get('edit/{id}', [ZakatItemController::class, 'edit']);

    Route::post('update/{id}', [ZakatItemController::class, 'update']);
    Route::delete('delete/{id}', [ZakatItemController::class, 'delete']);
});
Route::group(['prefix' => 'blogs', 'middleware' => 'auth:sanctum'], function () {
    // Route::get('/', [ZakatItemController::class, 'index']);
    Route::post('add', [BlogController::class, 'add']);
    Route::get('edit/{id}', [BlogController::class, 'edit']);
    Route::post('update/{id}', [BlogController::class, 'update']);
    Route::delete('delete/{id}', [BlogController::class, 'delete']);
});
Route::group(['prefix' => 'nisabs', 'middleware' => 'auth:sanctum'], function () {
    // Route::get('/', [ZakatItemController::class, 'index']);
    Route::post('add', [NisabController::class, 'add']);
    Route::get('edit/{id}', [NisabController::class, 'edit']);
    Route::post('update/{id}', [NisabController::class, 'update']);
    Route::delete('delete/{id}', [NisabController::class, 'delete']);
});

Route::group(['prefix' => 'faqs', 'middleware' => 'auth:sanctum'], function () {
    // Route::get('/', [ZakatItemController::class, 'index']);
    Route::post('add', [FaqController::class, 'add']);
    Route::get('edit/{id}', [FaqController::class, 'edit']);
    Route::post('update/{id}', [FaqController::class, 'update']);
    Route::delete('delete/{id}', [FaqController::class, 'delete']);
});
Route::group(['prefix' => 'donations', 'middleware' => 'auth:sanctum'], function () {
    // Route::get('/', [ZakatItemController::class, 'index']);
    Route::get('/', [DonationController::class, 'index']); 


    Route::delete('delete/{id}', [DonationController::class, 'delete']);
});



Route::middleware('auth:sanctum')->group( function () {
    Route::post('/mosque',  [MosqueController::class, 'index' ]);
    Route::put('/mosque{id}',  [MosqueController::class, 'update' ]);
    Route::delete('/mosque{id}',  [MosqueController::class, 'destroy' ]);
    // Route::post('/blogs',  [BlogController::class, 'store' ]);
    // Route::put('/blogs{id}',  [BlogController::class, 'update' ]);
    // Route::delete('/blogs{id}',  [BlogController::class, 'destroy' ]);
    

});

    Route::get('/zakatitems', [ZakatItemController::class, 'index']); 
    Route::get('/nisabs', [NisabController::class, 'index']);   

    // Route::get('/blogs', [ZakatItemController::class, 'index']);   

    Route::post('/donations/add', [DonationController::class, 'add']); 
    Route::post('/zakat-requests/add', [ZakatRequestController::class, 'add']);   
    Route::group(['prefix' => 'zakat-requests', 'middleware' => 'auth:sanctum'], function () {
        // Route::get('/', [ZakatItemController::class, 'index']);
    Route::get('/', [ZakatRequestController::class, 'index']); 
    Route::delete('delete/{id}', [ZakatRequestController::class, 'delete']);
});

    // Route::post('/reuqest-zakat', [DonationController::class, 'add']);   
    
    
    Route::get('/mosque',  [MosqueController::class, 'index' ]);
    Route::get('/mosque/{id}',  [MosqueController::class, 'show' ]);
    Route::get('/blogs',  [BlogController::class, 'index' ]);
    Route::get('/faqs',  [FaqController::class, 'index' ]);



    // Route::get('/blogs/{id}',  [ZakatItemController::class, 'show' ]);
  
    
    