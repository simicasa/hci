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
        $iduser=Auth::user()->id;
        $this->validate($req,[
            'latitudine'=> 'required|numeric',
            'longitudine'=>'required',
            'nomeluogo'=>'required'   
        ],[
            'latitudine.numeric'=>'La latitudine non è stata inserita corretamente', 
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

        return redirect()->intended("/amministrazione/modificamarker?val=1");
        
    }
    public function ritornaMarkerPerAPP(){
        
        
        return json_encode(marker::select('latitudine','longitudine','nome_luogo')->get());
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function shows(Request $req)
    {
        $stato=$req->input("val");
        $val=marker::get();//ritorna i volori della tabella del database
        return view("listamarker")->with("mlista",$val)->with("val",$stato);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {-
        $id=$req->input("id");
        $riga=marker::find($id);
        return view("modificamarker")->with("riga",$riga);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \/amministrazione/modificaIlluminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $latitudine=$req->input("latitudine");
        $longitudine=$req->input("longitudine");
        $nomeluogo=$req->input("nomeluogo");
        $id=$req->input("id");
        $riga=marker::find($id);
        $this->validate($req,[
            'latitudine'=> 'required|numeric',
            'longitudine'=>'required',
            'nomeluogo'=>'required'   
        ],[
            'latitudine.numeric'=>'La latitudine non è stata inserita corretamente', 
            'latitudine.required'=>'Inserire la latitudine!',
            'longitudine.required'=>'Inserire la longitudine!',
            'nomeluogo.required'=>'Scegliere un nome del luogo!'
        ]
        );
        $riga->latitudine=$latitudine;
        $riga->longitudine=$longitudine;
        $riga->nome_luogo=$nomeluogo;
        $riga->save();
        return redirect()->intended("/amministrazione/modificamarker?val=2");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        $id=$req->input("id");
        $riga=marker::find($id);
        $riga->delete();
        return redirect()->intended("/amministrazione/modificamarker?val=3");
    }
}
