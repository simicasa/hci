@extends("master") 
@section("titolo","registrazione")
@section("corpo")
    @if (count($errors)>0)
        @foreach($errors->all() as $r)
            {!! $r !!}<br>
        @endforeach
@endif
    <form method="post" action="registrazione">
        <input name="_token" type="hidden" value="{!! csrf_token() !!}">
        username:<input type="text" name="name" required><br>
        email:<input type="email" name="email" required><br>
        password:<input type="password" name="password" minlenght="6" required><br>
        conferma password:<input type="password" name="password_confirmation" minlenght="6" required><br>
        <input type="submit" value="invia">
    </form>
@stop