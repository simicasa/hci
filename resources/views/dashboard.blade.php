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
     map: map,
     title: "{!! $l->nome_luogo !!}"
        });
@endforeach        
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
function localizzapunto(lat,lng){
    var latlng = new google.maps.LatLng(lat,lng);
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
@section("titolo","login")
@section("corpo")
<div id="map"></div>
<div><h1>Ultimi luoghi inseriti</h1></div>
<table id="tabella" class="table table-striped table-bordered table-hover">
    <thhead>
        <tr>
            <th width="34%">Nome luogo</th>
            <th width="33%">Nome utente</th>

        </tr>
    </thhead>
    <tbody>
        @foreach($ultimi as $elem)
        <tr onclick="localizzapunto({!! $elem->lat !!},{!! $elem->lng !!})">
            <td>{!! $elem->nomeluogo !!}</td>
            <td>{!! $elem->nomeutente !!}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop