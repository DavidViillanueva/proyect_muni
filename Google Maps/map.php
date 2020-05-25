<?php
  include_once "searchMaps.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>     
      #map {
        height: 75%;
        width: 100%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 25px;
        left: 50%;
        z-index: 5;
        background-color: #fff;
        padding: 7px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
    
  </head>
  <body>
    <!-- Lugar para pasar la direccion-->
    <div id="floating-panel">
      <input  hidden id="address" type="textbox" value="<?php echo $direccion.$localidad?>">
      <input id="submit" type="button" value="Buscar">
    </div>

    <div id="map"></div>
    
    <script>
      function initMap() {
        //Visualizar Mapa.
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13.5,
          center: {lat: -38.9, lng: -70.0667}
        });
        //------------------------------------------------------------------------
        
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit').addEventListener('click', function() {geocodeAddress(geocoder, map);});
      }
      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode no tuvo éxito por la siguiente razón: ' + status);
          }
        });
      }
    </script>
    <!--Lugar de la Key de Google-->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABw0O3n5x-DsLMr9jrG2X0f32XREZXWPQ&callback=initMap">
    </script>
  </body>
</html>