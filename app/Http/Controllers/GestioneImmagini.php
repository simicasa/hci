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
        $this->validate($request,[
            'Immagine'=> 'required|image'
        ],[
            'Immagine.required'=>'Immagine non presente',
            'Immagine.image'=>'Immagine non valida',
            
        ]
        );
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

        return redirect()->intended("/amministrazione/mostraimmagini?val=1");
        
    }

    public function GetImageFromApp(Request $req){
        $id = $req->input('id');
        $elem = json_encode(Immagini::select('Immagine','Testo','DataFoto')->where('id_marker','=',$id)->oderby("DataFoto","DESC")->get());
        return $elem;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {        
        $stato=$req->input("val");
        $var = marker::get();
        return view("mostraimmagini")->with("mlista",$var)->with("val",$stato);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getimagebyid(Request $req){
        $immagini=Immagini::where("id_marker","=",$req->input("id"))->orderby("DataFoto")->get();
        return json_encode($immagini);
    }
        
    
    public function edit(Request $req)
    {
        $id=$req->input("id");
        $riga=Immagini::find($id);
        return view("modificaimmagine")->with("riga",$riga);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $testo=$req->input("Testo");
        $data=$req->input("data");
        $id=$req->input("id");
        $riga=Immagini::find($id);
        if(Input::file('Immagine')){
            $this->validate($req,[
                'Immagine'=> 'required|image'
            ],[
                'Immagine.required'=>'Immagine non presente',
                'Immagine.image'=>'Immagine non valida',
            
            ]
            );
            $image=Input::file('Immagine');
        
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $percorso = 'upload/' . $filename;
            Image::make($image->getRealPath())->resize(300, null, function($constraint){
            $constraint->aspectRatio();
            })->save($percorso);
        }
        else{
            $percorso=$riga->Immagine;
        }
        $riga->Testo=$testo;
        $riga->DataFoto=$data;
        $riga->Immagine=$percorso;
        $riga->save();
        return redirect()->intended("/amministrazione/mostraimmagini?val=2");
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
        $riga=Immagini::find($id);
        $riga->delete();
        return redirect()->intended("/amministrazione/mostraimmagini?val=3");
    }
}
