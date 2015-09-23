@extends("master") 
@section("titolo","inserimentomarker")
@section("corpo")
    <form method="post" action="inserimentomarker">
        <input name="_token" type="hidden" value="{!! csrf_token() !!}">
        Latitudine:<input type="text" name="latitudine" required><br>
        Longitudine:<input type="text" name="longitudine" required><br>
        Nome Luogo:<input type="text" name="nomeluogo" required><br>
        <input type="submit" value="invia">
</form>
@stop