@extends("master") 
@section("titolo","modifica")
@section("corpo")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Modifica marker</h1>
    </div>
</div>
<div class="panel-body">
    @if (count($errors)>0)
    <ul>
    @foreach($errors->all() as $r)
        <li>{!! $r !!}</li>
    @endforeach
    </ul>
@endif
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="modifica" >
                 <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                 <input type="hidden" name="id" value="{!! $riga->id!!}">   
          <div class="form-group">
                    <label>Nome Luogo</label>
                    <input type="text" name="nomeluogo" value="{!! $riga->nome_luogo !!}" required class="form-control">
                    <p class="help-block">Esempio "Piazza Dante"</p>
                </div>             
                <div class="form-group">
                    <label>Latitudine</label>
                    <input type="text" name="latitudine" value="{!! $riga->latitudine !!}" required class="form-control">
                    <p class="help-block">Prelevare questa informazione da google maps</p>
                </div>
                <div class="form-group">
                    <label>Longitudine</label>
                    <input type="text" name="longitudine" value="{!! $riga->longitudine !!}"required class="form-control">
                    <p class="help-block">Prelevare questa informazione da google maps</p>
                </div>
                <input class="btn btn-default" type="submit" value="invia">
            </form>
        </div>
    </div>
</div>


@stop