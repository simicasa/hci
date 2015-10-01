@extends("master") 
@section("titolo","mostraimmagini")
@section("corpo")

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Immagini</h1>
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
    Immagine eliminata con successo
</div>
@endif
<table class="table table-striped table-bordered table-hover">
    <thhead>
        <tr>
            <th width="34%">Immagine</th>
            <th width="33%">Modifica</th>
            <th width="33%">Elimina</th>
        </tr>
    </thhead>
    <tbody>
        @foreach($mlista as $elem)
        <tr>
            <td><img src="/{!! $elem->Immagine !!}" width="150" height="auto"></td>
            <td><a href="#"><p class="fa fa-edit"></p></a></td>
            <td><a href="#"><p class="fa fa-times-circle"></p></a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
