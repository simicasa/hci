@extends("master") 
@section("titolo","inserimentomarker")
@section("corpo")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Inserisci nuovo marker</h1>
    </div>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="inserimentomarker">
                <div class="form-group">
                    <label>Nome Luogo</label>
                    <input type="text" name="nomeluogo" required class="form-control">
                    <p class="help-block">Esempio "Piazza Dante"</p>
                </div>             
                <div class="form-group">
                    <label>Latitudine</label>
                    <input type="text" name="longitudine" required class="form-control">
                    <p class="help-block">Prelevare questa informazione da google maps</p>
                </div>
                <div class="form-group">
                    <label>Longitudine</label>
                    <input type="text" name="nomeluogo" required class="form-control">
                    <p class="help-block">Prelevare questa informazione da google maps</p>
                </div>
                <input class="btn btn-default" type="submit" value="invia">
            </form>
        </div>
    </div>
</div>


@stop