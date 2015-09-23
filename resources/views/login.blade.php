@extends("master") 
@section("titolo","login")
@section("corpo")
    <form method="post" action="login">
        <input name="_token" type="hidden" value="{!! csrf_token() !!}">
        username:<input type="text" name="username" required><br>
        password:<input type="password" name="password" maxlenght="10" minlenght="6" required><br>
        <input type="submit" value="invia">
    </form>
@stop