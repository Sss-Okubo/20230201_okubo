<?php
// 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\SearchController;


Route::get('/', [TodoController::class, 'index'])->middleware('auth');  // ホーム画面
Route::post('/create', [TodoController::class, 'create']);              // タスク追加
Route::post('/edit', [TodoController::class, 'edit']);                  // タスク更新
Route::post('/delete', [TodoController::class, 'delete']);              // タスク削除
Route::get('/find', [TodoController::class, 'find']);                   // 検索画面表示
Route::get('/search', [TodoController::class, 'search']);               // タスク検索


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
