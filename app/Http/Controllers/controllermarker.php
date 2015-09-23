<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\marker;
class controllermarker extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("inserimentoMarker");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $latitudine=$req->input("latitudine");
        $longitudine=$req->input("longitudine");
        $nomeluogo=$req->input("nomeluogo");
        $iduser=1;
        $this->validate($req,[
            'latitudine'=> 'required',
            'longitudine'=>'required',
            'nomeluogo'=>'required'   
        ],[
            'latitudine.required'=>'Inserire la latitudine!',
            'longitudine.required'=>'Inserire la longitudine!',
            'nomeluogo.required'=>'Scegliere un nome del luogo!'
        ]
        );
        $marker= new marker;
        $marker->latitudine=$latitudine;
        $marker->longitudine=$longitudine;
        $marker->nome_luogo=$nomeluogo;
        $marker->id_utente=$iduser;
        $marker->save();
        echo "Il marker &egrave; stato inserito correttamente!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
