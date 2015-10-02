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
                    str=str+"<div class='contenitore'>";
                    str=str+"<img src='/" + this.Immagine + "'>";
                    str=str+"<div class='testo'>" + this.Testo + "</div>";
                    str=str+"<div class='data'>" + this.DataFoto + "</div>";
                    str=str+"<div class='modifica'><a href='#'><p class='fa fa-edit'>Modifica</p></a></div>";
                    str=str+"<div class='elimina'><a href='#'><p class='fa fa-times-circle'>Elimina</p></a></div>";
                    str=str + "</div>";
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
