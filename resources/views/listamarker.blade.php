@extends("master") 
@section("titolo","listamarker")
@section("corpo")

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Marker</h1>
                </div>
            </div>
@if($val == 1)
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
Inserimento avvenuto con successo.
</div>
@endif

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