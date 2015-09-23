<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
class controllerautenticazione extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("login");
    }
    
        public function registrazione()
    {
        return view("registrazione");
    } 
    
    public function autenticazione(Request $req)
    {
        $username=$req->input("username");
        $password=$req->input("password");
        if(Auth::attempt(array('name'=>$username,'password'=>$password)))
        {
            echo "Login corretto";
        }
        else
        {
            echo "Errore";
        }
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
        $username=$req->input("name");
        $email=$req->input("email");
        $password=$req->input("password");
        $password2=$req->input("password_confirmation");
        $this->validate($req,[
            'name'=> 'required |unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
            'password_confirmation'=>'required|min:6',
        ],[
            'name.required'=>'Inserire il nome!',
            'email.required'=>'Inserire il proprio indirizzo email!',
            'email.unique'=>'Indirizzo email già esistente!',
            'email.email'=>'L\'indirizzo specificato deve essere un indirizzo email valido.',
            'password.required'=>'Scegliere una password!',
            'password.min'=>'Inserire una password di almeno 6 caratteri',
            'password.confirmed'=>'Errore,la password inserita non corrisponde a quella di conferma',
            'password_confirmation.required'=>'Password errata'
        ]
        );
        $utente=new User;
        $utente->name=$username;
        $utente->email=$email;
        $utente->password=Hash::make($password);
        $utente->save();
        echo "L'utente " . $utente->name . " &egrave; stato registrato";
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
