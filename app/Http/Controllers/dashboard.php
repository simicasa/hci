<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\marker;

class dashboard extends Controller
{

    public function index()
    {
        $val=marker::get();
        $ultimi=marker::select('Marker.nome_luogo as nomeluogo','users.name as nomeutente')->join('users','Marker.id_utente','=','users.id')->orderby('Marker.id','desc')->limit(5)->get();
        return view("dashboard")->with('lista',$val)->with('ultimi',$ultimi);
    }

   
}
