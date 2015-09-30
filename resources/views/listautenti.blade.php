@extends("master") 
@section("titolo","listautenti")
@section("corpo")

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modifica amministratori</h1>
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
    Utente eliminato
</div>
@endif
<table class="table table-striped table-bordered table-hover">
    <thhead>
        <tr>
            <th width="30%">Username</th>
            <th width="30%">Email</th>
            <th width="25%">Modifica</th>
            <th width="25%">Elimina</th>
        </tr>
    </thhead>
    <tbody>
        @foreach($mlista as $elem)
        <tr>
            <td>{!! $elem->name !!}</td>
            <td>{!! $elem->email !!}</td>
            <td><a href="/amministrazione/modificautente?id={!! $elem->id !!}"><p class="fa fa-edit"></p></a></td>
            <td><a href="/amministrazione/eliminautente?id={!! $elem->id !!}"><p class="fa fa-times-circle"></p></a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<form>
</form>
@stop