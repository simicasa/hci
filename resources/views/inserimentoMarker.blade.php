@extends("master") 
@section('testa')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<style type="text/css">
    #map { 
        height:400px;
        width:100%;
    }
    </style>
<script type="text/javascript">
    var geocoder;
    var map;
    function initMap() {
        geocoder = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 40.828160, lng: 14.193066},
            zoom: 15
        });
        @foreach($lista as $l)
        var latlng = new google.maps.LatLng({!! $l->latitudine !!}, {!! $l->longitudine !!});
        var marker = new google.maps.Marker({
            position: latlng, 
            map: map
        });
        @endforeach
        google.maps.event.addListener(map, "click", function (event) {
            var latitude = event.latLng.lat();
            var longitude = event.latLng.lng();
            $("input[name=latitudine]").val(latitude);
            $("input[name=longitudine]").val(longitude);



        });
    }
    

    
    function moveMap(){
         var lat = parseFloat($("input[name=latitudine]").val());
         var log = parseFloat($("input[name=longitudine]").val());
        var latlng = new google.maps.LatLng(lat,log);
        geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(latlng);     
          } 
         else {
             alert('No results found');
        }
        });
    }
</script>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initMap">
    </script>
@stop
@section("titolo","inserimentomarker")
@section("corpo")
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Inserisci nuovo marker</h1>
    </div>
</div>
<div class="panel-body">
    @if (count($errors)>0)
    <ul>edit
    @foreach($errors->all() as $r)
        <li>{!! $r !!}</li>
    @endforeach
    </ul>
@endif
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="inserimentomarker" >
                 <input name="_token" type="hidden" value="{!! csrf_token() !!}">
          <div class="form-group">
                    <label>Nome Luogo</label>
                    <input type="text" name="nomeluogo" required class="form-control">
                    <p class="help-block">Esempio "Piazza Dante"</p>
                </div>             
                <div class="form-group">
                    <label>Latitudine</label>
                    <input type="text" name="latitudine" required class="form-control">
                    <label>Longitudine</label>
                    <input type="text" name="longitudine" required class="form-control">
                    <p class="help-block">Prelevare questa informazione da google maps</p>
                </div>
                <div id="map"></div>
                <input class="btn btn-default" type="submit" value="invia">
            </form>
        </div>
    </div>
</div>


@stop