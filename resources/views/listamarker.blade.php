@extends("master") 
@section("titolo","modificamarker")
@section("corpo")
<table width="70%" border="1">
    <caption><div align="center"><b>Marker presenti</b></div></caption>
    <thhead>
        <tr>
            <th width="33%">Latitudine</th>
            <th width="33%">Longitudine</th>
            <th width="34%">Nome luogo</th>
        </tr>
    </thhead>
    <tbody>
        @foreach($mlista as $elem)
        <tr>
            <td>{!! $elem->latitudine !!}</td>
            <td>{!! $elem->longitudine !!}</td>
            <td>{!! $elem->nome_luogo !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop