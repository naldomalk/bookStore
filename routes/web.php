<?php

use Illuminate\Http\Request;
use App\Http\Controllers;

Route::get('/', function () { return ''; }); // TODO front-end

Route::get('/status', function () { return 'bookStore API Running.'; }); // TODO front-end

Route::get('/api/books', function (Controllers\BooksController $controller) { return $controller->getMany(); });
Route::get('/api/books/{id}', function (Controllers\BooksController $controller) { return $controller->getOne(); });
Route::post('/api/books', function (Controllers\BooksController $controller) { return $controller->create(); });
Route::delete('/api/books/{id}', function (Controllers\BooksController $controller) { return $controller->delete(); });