@extends("master") 
@section("titolo","modicautente")
@section("corpo")

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Modifica Utente</h1>
    </div>
</div>
<div class="panel-body">
@if (count($errors)>0)
    <ul>
    @foreach($errors->all() as $r)
        <li>{!! $r !!}</li>
    @endforeach
    </ul>
@endif
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="modificautente">
                <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                <input type="hidden" name="id" value="{!! $riga->id !!}">   
             <div class="form-group">
                <label>username</label>
                <input type="text" name="name" value="{!! $riga->name !!}" required class="form-control">
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" value="{!! $riga->email !!}"required class="form-control">
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="password" name="password" required class="form-control">
            </div>
            <div class="form-group">
                <label>conferma password</label>
                <input type="password" name="password_confirmation" required class="form-control">
            </div>   
                <input class="btn btn-default" type="submit" value="invia">
            </form>
        </div>
    </div>
</div>
@stop