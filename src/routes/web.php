<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

/**
 * Создать новую статью
 */
Route::post('/topics/create', [TopicController::class, 'createTopic'])
    ->name('createTopic');

/**
 * Получить автора статьи
 */
Route::get('/topics/{topic}/author', [TopicController::class, 'getTopicAuthor'])
    ->name('getTopicAuthor');

/**
 * Получить все статьи автора
 */
Route::get('/customer/{customer}/topics', [CustomerController::class, 'getCustomerTopics'])
    ->name('getCustomerTopics');

/**
 * Сменить автора статьи
 */
Route::put('/topics/{topic}/edit', [TopicController::class, 'editTopicAuthor'])
    ->name('editTopicAuthor');
