<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get("/","controllerautenticazione@index");// prima / rappresenta il percorso quando apro 127.0.0.1 in questo caso la prima pagina visto che non c'è niente dopo /, controllerautenticazione è il nome del controller ed è una classe come metodo definisco index.
Route::post("/login","controllerautenticazione@autenticazione");

Route::get("/amministrazione/registrazione","controllerautenticazione@registrazione");
Route::get("/amministrazione/listautenti","controllerautenticazione@shows");
Route::post("/amministrazione/registrazione","controllerautenticazione@store");

Route::get("/amministrazione/inserimentomarker","controllermarker@index");
Route::post("/amministrazione/inserimentomarker","controllermarker@store");
Route::get("/amministrazione/modificamarker","controllermarker@shows");

Route::get("/amministrazione/dashboard","dashboard@index");
