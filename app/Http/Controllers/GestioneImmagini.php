<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\marker;
use App\Immagini;
use Image;
use Input;
use Auth;

class GestioneImmagini extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('InserimentoImmagini')->with('marker',marker::get());
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
    public function store(Request $request)
    {
        $image=Input::file('Immagine');
        
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $percorso = 'upload/' . $filename;
        Image::make($image->getRealPath())->resize(300, null, function($constraint){
            $constraint->aspectRatio();
        })->save($percorso);
          
        $iduser=Auth::user()->id;
        $Immagine = new Immagini;
        $Immagine->Immagine=$percorso;
        $Immagine->Testo=$request->input('Testo');
        $Immagine->DataFoto=$request->input('data');
        $Immagine->id_marker=$request->input('marker');
        $Immagine->id_utente=$iduser;
        $Immagine->save();

        return redirect()->intended("/amministrazione/listamarker?val=1");
        
    }

    public function GetImageFromApp(Request $req){
        $id = $req->input('id');
        $elem = json_encode(Immagini::select('Immagine','Testo','DataFoto')->where('id_marker','=',$id)->get());
        return $elem;
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
