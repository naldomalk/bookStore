<?php
use Illuminate\Http\Request;
use App\Http\Controllers;

Route::get('/', function () { return ''; }); // TODO front-end

Route::get('/status', function () { return 'bookStore app Running.'; });

// api calls
Route::get('api/books', 'BooksController@getMany' );
Route::get('api/books/{id}', 'BooksController@getOne' );
Route::post('api/books', 'BooksController@create' );