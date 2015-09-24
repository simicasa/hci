@extends("master") 
@section("titolo","listautenti")
@section("corpo")
<table width="70%" border="1">
    <caption><div align="center"><b>Utenti presenti</b></div></caption>
    <thhead>
        <tr>
            <th width="33%">Nome</th>
            <th width="33%">Email</th>
            <th width="33%">Azioni</th>
        </tr>
    </thhead>
    <tbody>
        @foreach($mlista as $elem)
        <tr>
            <td>{!! $elem->name !!}</td>
            <td>{!! $elem->email !!}</td>
            <td><input type="button" value="modifica"</td>
        </tr>
        @endforeach
    </tbody>
</table>
<form>
</form>
@stop