<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index']);//一覧表示
Route::post('/create', [TodoController::class, 'create']);//タスク追加
Route::post('/edit', [TodoController::class, 'edit']);//タスク更新
Route::post('/delete', [TodoController::class, 'delete']);//タスク削除

