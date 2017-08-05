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
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--note:we used font-awesome for font-icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.6.3/css/font-awesome.min.css') }}">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    

</head>
<body>
    
    <!--nav-->

    <ul id="slide-out" class="side-nav">
        <li><div class="user-view">
          <div class="background">
            <img src="{{asset('images/1.jpg')}}">
          </div>
          <a href="#!user"><img class="circle" src="{{asset('images/2.jpg')}}"></a>
          <a href="#!name"><span class="white-text name">{{$location->name}}</span></a>
          <a href="#!email"><span class="white-text email">{{$location->email}}</span></a>
        </div></li>
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('add-place.get')}}">Add Place</a></li>
        <li><a id="logout" href="#!">Logout</a></li>
        
    </ul>
    

    <!--/nav-->


    <!-- main-content -->
    <div class="row">
        <div class="container-fluid">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-sm-6">
            <div class="content-element">
                <div class="title text-left">
                    <h2 style="font-weight: 300">MAKE YOUR HOLYDAY GREAT</h2>
                </div>

                <p>
                    <span class="b">Your Current Location : </span>
                    <span id="name"></span>
                </p>

                <div class="card-block">
                    

                    <div class="popular-palces">
                        <p>Some Nearset Popular Places :</p>
                        <p>
                          <ul id="nearest_place" class="list-group"></ul>
                        </p>
                    </div>
                </div>

                <div class="loca-info">
                    <p class="info">
                        Nearest Hotels & Restaurants
                    </p>
                     <div class="faq" style="padding: 30px 0px;">
                        <div class="accordion">

                            <!--start:accordion-->
                            <div class="part">
                                <div class="head">
                                    <i class="fa fa-question-circle"></i>
                                    <!--question icon-->

                                    Check Hotels
                                    <!--put headline here-->

                                    <div class="description desk-1">
                                        
                                    </div>
                                </div>



                                <div class="head">
                                    <i class="fa fa-question-circle"></i>
                                    <!--question icon-->

                                    Check Restaurent
                                    <!--put headline here-->

                                    
                                       <div class="description desk-2">
                                      
                                      </div>
                                    
                                </div>

                            </div>
                            <!--end ".part"-->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>


        <div class="col-sm-6">
             <div class="map-section">
                <ul class="nav nav-pills">
                    <li class="active"><a data-toggle="tab" href="#map-view">Map</a></li>
                    <li><a data-toggle="tab" href="#road-view">Hotels</a></li>
                    
                </ul>

                <br>
                <div class="tab-content">
                  <div id="map-view" class="tab-pane fade in active">
                    <h5>Current Location</h5>
                    <div id="map"></div>
                  </div>
                  <div id="road-view" class="tab-pane fade">
                    <div id="hotel"></div>
                  </div>
                  
                </div>
            </div>
        </div>

    </div>

    <form id="frmlogout" method="POST" action="{{ route('logout') }}">
        {!! csrf_field() !!}
    </form>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>

    <script src="{{asset('js/main.js')}}"></script>

    <script>
      document
      .getElementById('logout')
      .addEventListener('click', function(e){
        e.preventDefault();
        document.getElementById('frmlogout').submit();
      });
    </script>

    <script>
        window.home = @php 
                echo json_encode([
                    'userLocation' => $location,
                    'home' => route('visiting-places', ['area_code' => '#area_code#'])
                ]);

        @endphp
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>

    <script type="text/javascript">
        var root = 'http://jsonplaceholder.typicode.com';

    </script>


    <script type="text/javascript">
        var data = window.home.userLocation;
        already = 0;
        console.log(data);
        function initMap() {
            var latLng  = {
                lat : Number(data.location.current_lat),
                lng: Number(data.location.current_lng)
            }
            var map = new google.maps.Map(document.getElementById('map'), {
              center: latLng,
              zoom: 8
            });

            var hotel = new google.maps.Map(document.getElementById('hotel'), {
              center: latLng,
              zoom: 8
            });

           var geocoder = new google.maps.Geocoder;
            var service = new google.maps.places.PlacesService(map);
            var infowindow = new google.maps.InfoWindow();
           var place_id;
            geocoder.geocode({'location': latLng}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
              if (results[1]) {
                console.log('te',results[1].place_id);
                place_id = results[1].place_id;
                service.getDetails({
                  placeId: place_id
                }, function(place, status) {
                    console.log('place',place)
                        var address_level_2 ;
                        place.address_components.map(function(addr){
                            addr.types.map(function(types){
                                if(types === 'administrative_area_level_2'){
                                    address_level_2 = addr.short_name;
                                }
                            })
                        });
                        var root = window.home.home.replace('#area_code#', address_level_2);
                        
                        var nearest_stack = [];
                        axios.get(root)
                             .then(function(res){
                                res.data.touristPlaces.map(function(item){
                                   var insertLat = {
                                        lat : Number(item.lat),
                                        lng: Number(item.lng)
                                    }
                                    nearest_stack.push(insertLat);
                                });

                                findNearestPlace(nearest_stack);
                                
                             })
                             .catch(function(e){
                                console.log(e.response);
                             })
                 document.getElementById('name').innerHTML = place.name;
                  if (status === google.maps.places.PlacesServiceStatus.OK) {
                    var marker = new google.maps.Marker({
                      map: map,
                      position: place.geometry.location
                    });
                    google.maps.event.addListener(marker, 'click', function() {
                      infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                        'Place ID: ' + place.place_id + '<br>' +
                        place.formatted_address + '</div>');
                      infowindow.open(map, this);
                    });
                  }
                });
              } else {
                window.alert('No results found');
              }
            } else {
              window.alert('Geocoder failed due to: ' + status);
            }
          });
        console.log('ee',place_id)

        var train_station_map = new google.maps.Map(document.getElementById('hotel'), {
          center: latLng,
          zoom: 14
        });

        var res_map = new google.maps.Map(document.getElementById('hotel'), {
          center: latLng,
          zoom: 14
        });

         var service = new google.maps.places.PlacesService(train_station_map);
          service.nearbySearch({
            location: latLng,
            radius: 1000,
            type: ['lodging']
          }, callback);

          var ResService = new google.maps.places.PlacesService(res_map);
          service.nearbySearch({
            location: latLng,
            radius: 1000,
            type: ['restaurant']
          }, callbackRes);

          function callbackRes(results, status) {
             console.log('restaurant',results);
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
              createMarkerRes(results[i], res_map);
            }
            var distance =  new google.maps.DistanceMatrixService;
             distance.getDistanceMatrix({
              origins: [latLng],
              destinations: res_stack,
              travelMode: 'DRIVING',
              unitSystem: google.maps.UnitSystem.METRIC,
              avoidHighways: false,
              avoidTolls: false
            }, function(response, status) {
              /*
                restaurent deatils will lopp here
              */
              
              if(already <= 0) {
                var elem = response.rows[0].elements;
                var destinationsAdd = results
                for(var i = 0; i < elem.length; i++ ) {
                  $('.desk-2').append('<div class="each_info" />');
                   var new_string = '<li>' +destinationsAdd[i].name + ' (' + elem[i].distance.text + ',' + elem[i].duration.text + ')' + '</li>' ;
                    $('#station_details').append(new_string)
                }

                $('.desk-2 .each_info').each(function(i){
                  $(this).append('<p><span> Name: </span><span>'+ destinationsAdd[i].name +
                    '</span></p> <p> <span> Distance: </span> <span>'+ elem[i].distance.text +'</span</p>  <p><span> Duration : </span><span>'+elem[i].duration.text + ' </span></p>')
                })

                $('.each_info').css({
                  'box-shadow': '0px 0px 5px rgba(0,0,0,0.2)',
                  'padding': '10px',
                  'margin-bottom': '15px'
                })

              } 
            })
          }
          }

        function callback(results, status) {
            console.log('a',results);
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
                var destinationsAdd = results

                 /*
                    Lodgind details
                  */
                for(var i = 0; i < elem.length; i++ ) {
                  $('.desk-1').append('<div class="each_info" />');
                   var new_string = '<li>' +destinationsAdd[i].name + ' (' + elem[i].distance.text + ',' + elem[i].duration.text + ')' + '</li>' ;
                    $('#station_details').append(new_string)
                }

                $('.desk-1 .each_info').each(function(i){
                  $(this).append('<p><span> Name: </span><span>'+ destinationsAdd[i].name +
                    '</span></p> <p> <span> Distance: </span> <span>'+ elem[i].distance.text +'</span</p>  <p><span> Duration : </span><span>'+elem[i].duration.text + ' </span></p>')
                })

                $('.each_info').css({
                  'box-shadow': '0px 0px 5px rgba(0,0,0,0.2)',
                  'padding': '10px',
                  'margin-bottom': '15px'
                })

              } 
            })
          }
        }





        function findNearestPlace(param) {
        
            var distance =  new google.maps.DistanceMatrixService;
             distance.getDistanceMatrix({
              origins: [latLng],
              destinations: param,
              travelMode: 'DRIVING',
              unitSystem: google.maps.UnitSystem.METRIC,
              avoidHighways: false,
              avoidTolls: false
            }, function(response, status) {
                console.log(response)
                var new_stack = [];
                for(var i = 0; i < response.rows[0].elements.length; i++) {
                    var data = {
                        name: response.destinationAddresses[i],
                        length: response.rows[0].elements[i],
                        location: param[i]
                    }
                    new_stack.push(data);
                }
                console.log(new_stack);
                var sorts = new_stack.sort(function(a,b){
                    return a.length.distance.value - b.length.distance.value;
                })

               for(var i = 0; i < sorts.length; i++ ) {
                   var new_string = '<a href=place-details/'+latLng.lat+'/'+latLng.lng+'/'+sorts[i].location.lat+'/'+sorts[i].location.lng+'>'+'<li class="list-group-item'+'">' +sorts[i].name + ' (' + sorts[i].length.distance.text + ',' + sorts[i].length.duration.text + ')' + '</li></a>' ;
                    $('#nearest_place').append(new_string)
                }
            })
        }






        var train_station_stack = [];
        var res_stack = [];
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

        function createMarkerRes(place, map) {
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
           res_stack.push(insertLanLng)
        }

        
        }
    </script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWURC1EHNgmcSScwpIYdegYYcqoUKGDdo&libraries=places&callback=initMap"></script>
</body>
</html>