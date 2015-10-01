@extends("master") 
@section("titolo","inserimentomarker")
@section("corpo")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Inserisci Immagini</h1>
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
            <form method="post" action="InserimentoImmagini" enctype="multipart/form-data" accept-charset="UTF-8">
                 <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label>Seleziona luogo</label>
                    <select class="form-control" name="marker">
                    @foreach($marker as $m)
                        <option value='{!! $m->id !!}'>{!! $m->nome_luogo !!}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Testo</label>
                    <textarea name="Testo" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Data</label>
                    <input type="date" name="data" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Immagine</label>
                    <input type="file" name="Immagine" required class="form-control">
                </div>
                <input class="btn btn-default" type="submit" value="invia">
            </form>
        </div>
    </div>
</div>


@stop