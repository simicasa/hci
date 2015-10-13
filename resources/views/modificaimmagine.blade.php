@extends("master") 
@section("titolo","modificaimmagine")
@section("corpo")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Modifica Immagine</h1>
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
            <form method="post" action="modificaimmagine" enctype="multipart/form-data" accept-charset="UTF-8">
                 <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                 <input type="hidden" name="id" value="{!! $riga->id!!}">
                <div class="form-group">
                    <label>Testo</label>
                    <textarea name="Testo" value="{!! $riga->Testo !!}" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Data</label>
                    <input type="date" name="data" value="{!! $riga->DataFoto !!}" required class="form-control">
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