<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-default/index.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
   <!--  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZRAnE71J1pNXc96prs6BRr1z7PTWPJVs&libraries=places"></script>
 -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div id="map"></div>
    <script type="text/javascript">
    already = 0;
        function initMap() {
  var pyrmont = new google.maps.LatLng(24.9045,91.8611);
  var latLng = {
    lat : 24.9045,
    lng: 91.8611
  }

  map = new google.maps.Map(document.getElementById('map'), {
      center: pyrmont,
      zoom: 15
    });

  var train_station_map = new google.maps.Map(document.getElementById('map'), {
          center: latLng,
          zoom: 14
        });

     var service = new google.maps.places.PlacesService(train_station_map);
      service.nearbySearch({
        location: latLng,
        radius: 1000,
        type: ['bus_station']
      }, callback);

    function callback(results, status) {
        console.log(results);
      if (status === google.maps.places.PlacesServiceStatus.OK) {
        for (var i = 0; i < results.length; i++) {
          createMarker(results[i], train_station_map);
        }
        var distance =  new google.maps.DistanceMatrixService;
         distance.getDistanceMatrix({
          origins: [latLng],
          destinations: train_station_stack,
          travelMode: 'DRIVING',
          unitSystem: google.maps.UnitSystem.METRIC,
          avoidHighways: false,
          avoidTolls: false
        }, function(response, status) {
            console.log('asasssas',response)
          
          console.log(already)
          if(already <= 0) {
            var elem = response.rows[0].elements;
            var destinationsAdd = response.destinationAddresses
            for(var i = 0; i < elem.length; i++ ) {
               var new_string = '<li>' +destinationsAdd[i] + ' (' + elem[i].distance.text + ',' + elem[i].duration.text + ')' + '</li>' ;
                $('#station_details').append(new_string)
            }
          } 
        })
      }
    }

    var train_station_stack = [];
    function createMarker(place, map) {
       var placeLoc = place.geometry.location;
       var train_station_school_marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
      });
       var latLngs = place.geometry.location
       var insertLanLng = {
          lat: latLngs.lat(),
          lng: latLngs.lng()
       }
       train_station_stack.push(insertLanLng)
    }
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWURC1EHNgmcSScwpIYdegYYcqoUKGDdo&libraries=places&callback=initMap"></script>
</body>
</html>