@extends("master") 
@section("titolo","listautenti")
@section("corpo")


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Utenti</h1>
                </div>
            </div>

<table class="table table-striped table-bordered table-hover">
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