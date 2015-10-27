@extends("master") 
@section("titolo","modificamarker")
@section("corpo")

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Luoghi</h1>
                </div>
            </div>
@if($val == 1)
<div class="alert alert-success">
    Inserimento avvenuto con successo
</div>
@endif
@if($val == 2)
<div class="alert alert-success">
    Modifica avvenuta con successo
</div>
@endif
@if($val == 3)
<div class="alert alert-success">
    Marker eliminato con successo
</div>
@endif
<table class="table table-striped table-bordered table-hover">
    <thhead>
        <tr>
            <th width="34%">Nome luogo</th>
            <th width="33%">Latitudine</th>
            <th width="33%">Longitudine</th>
            <th width="33%">Modifica</th>
            <th width="33%">Elimina</th>
        </tr>
    </thhead>
    <tbody>
        @foreach($mlista as $elem)
        <tr>
            <td>{!! $elem->nome_luogo !!}</td>
            <td>{!! $elem->latitudine !!}</td>
            <td>{!! $elem->longitudine !!}</td>
            <td><a href="/amministrazione/modifica?id={!! $elem->id !!}"><p class="fa fa-edit"></p></a></td>
            <td><a href="/amministrazione/elimina?id={!! $elem->id !!}"><p class="fa fa-times-circle"></p></a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop