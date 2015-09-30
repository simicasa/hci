@extends("master") 
@section("titolo","lista marker")
@section("titolo","modificamarker")
@section("corpo")

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Marker</h1>
                </div>
            </div>

<table class="table table-striped table-bordered table-hover">
    <thhead>
        <tr>
            <th width="34%">Nome luogo</th>
            <th width="33%">Latitudine</th>
            <th width="33%">Longitudine</th>
            <th width="33%">Azioni</th>
        </tr>
    </thhead>
    <tbody>
        @foreach($mlista as $elem)
        <tr>
            <td>{!! $elem->nome_luogo !!}</td>
            <td>{!! $elem->latitudine !!}</td>
            <td>{!! $elem->longitudine !!}</td>
            <td><input type="button" value="modifica"</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop