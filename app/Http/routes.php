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

Route::group(['middleware' => 'logged'],function(){
    

    //Gestione utenti
    Route::get("/amministrazione/registrazione","controllerautenticazione@registrazione");
    Route::get("/amministrazione/logout","controllerautenticazione@logout");
    Route::get("/amministrazione/listautenti","controllerautenticazione@shows");
    Route::post("/amministrazione/registrazione","controllerautenticazione@store");
    Route::get("/amministrazione/modificautente","controllerautenticazione@edit");
    Route::post("/amministrazione/modificautente","controllerautenticazione@update");
    Route::get("/amministrazione/eliminautente","controllerautenticazione@destroy");

    //Gestione marker
    Route::get("/amministrazione/inserimentomarker","controllermarker@index");
    Route::post("/amministrazione/inserimentomarker","controllermarker@store");
    Route::get("/amministrazione/modificamarker","controllermarker@shows");
    Route::get("/amministrazione/modifica","controllermarker@edit");
    Route::post("/amministrazione/modifica","controllermarker@update");
    Route::get("/amministrazione/elimina","controllermarker@destroy");

    Route::get("/amministrazione/dashboard","dashboard@index");

    //gestione immagini
    Route::get("/amministrazione/InserisciImmagine","GestioneImmagini@index");
    Route::get("/amministrazione/mostraimmagini","GestioneImmagini@show");
    Route::post("/amministrazione/InserimentoImmagini","GestioneImmagini@store");

    //Comunicazione con app
    Route::post("/app/prelevaMarker","controllermarker@ritornaMarkerPerAPP");
    Route::post("/app/prelevaImmagini","GestioneImmagini@GetImageFromApp");
    
});

    //Comunicazione con app
    Route::post("/app/prelevaMarker","controllermarker@ritornaMarkerPerAPP");
    Route::post("/app/prelevaImmagini","GestioneImmagini@GetImageFromApp");
