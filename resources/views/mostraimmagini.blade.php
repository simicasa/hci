@extends("master")
@section("testa")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#marker").change(function (){
            var id=$("#marker").val();
            var token=$("input[name=_token]").val();
            $req = $.ajax({
                url:"/ajax/getimage",
                dataType:"json",
                type:"POST",
                data:{'_token':token,
                      'id':id,
                     },
            });
            $req.done(function(dt){
                var str="";
                $.each(dt,function(){
                    str=str+"<div class='row'>";
                    str=str+"<div class='col-lg-6'><img src='/" + this.Immagine + "'></div>";
                    str=str+"<div class='col-lg-6'><div class='panel panel-primary'><div class='panel-heading'>Descrizione luogo</div><div class='panel-body'><p>" + this.Testo +"</p></div><div class='panel-footer'>" + this.DataFoto +"</div></div>";
                    str=str + "</div></div>";
                    str=str+"<a href='/amministrazione/modificaimmagine?id=" + this.id + "'>";
                    str=str+"<p class='fa fa-edit'>Modifica</p></a>";
                    str=str+"<a href='/amministrazione/eliminaimmagine?id=" + this.id + "'style='margin-left:15%''>";
                    str=str+"<p class='fa fa-times-circle'>Elimina</p></a>";
                });
                $("#risultato").html(str);
            });
            $req.fail(function(dt){
                alert("errore");
            });   
        });
    });
</script>
@stop
@section("titolo","mostraimmagini")
@section("corpo")
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
<input name="_token" type="hidden" value="{!! csrf_token() !!}">
    <div class="form-group">
        <label>Seleziona luogo</label>
        <select id="marker" class="form-control" name="marker">
            <option></option>
            @foreach($mlista as $m)
                <option value='{!! $m->id !!}'>{!! $m->nome_luogo !!}</option>
            @endforeach
        </select>
    </div>
    <div id="risultato">
      



</div>
@stop
