<?php

use App\Http\Controllers\CkEditorController;
use Illuminate\Support\Facades\Route;


Route::prefix('editor')->group(function () { // 관리자 페이지
    $crudRoutes = [
        'ckEditor' => CkEditorController::class,
    ];

    foreach ($crudRoutes as $prefix => $controller) {
        Route::prefix($prefix)->controller($controller)->group(function () use ($prefix) {
            Route::get('/', 'index')->name("editor.{$prefix}Index");
            Route::get('/create', 'create')->name("editor.{$prefix}Create");
            Route::post('/upload', 'store')->name("editor.{$prefix}Upload");
            Route::post('/store', 'store')->name("editor.{$prefix}Store");
            Route::get('/{id}/edit', 'edit')->name("editor.{$prefix}Edit");
            Route::patch('/{id}', 'update')->name("editor.{$prefix}Update");
            Route::delete('/{id}', 'destroy')->name("editor.{$prefix}Destroy");
        });
    }
});
