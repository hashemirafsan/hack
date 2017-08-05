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

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/main1.css')}}">


    

</head>
<body>
    
    <!--nav-->

    <ul id="slide-out" class="side-nav">
        <li><div class="user-view">
          <div class="background">
            <img src="{{asset('images/1.jpg')}}">
          </div>
          <a href="#!user"><img class="circle" src="{{asset('images/2.jpg')}}"></a>
          
        </div></li>
        <li><a href="#!">Home</a></li>
        <li><a href="#!">Visit Place</a></li>
        <li><a id="logout" href="#!">Logout</a></li>
        
    </ul>
    

    <!--/nav-->


    <!-- main-content -->
    <div class="row">
        <div class="container-fluid">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </div>



    <div class="container">
        <div class="col-sm-12">
          <div class="main-search-input">

              <div class="main-search-input-item">
                <input  placeholder="What are you looking for?" value="" id="pac-input"/>
              </div>
              <button class="button add_location_btn">Add Location</button>

          </div>


          <div class="map-box" style="margin-top: 30px;">
            <div id="map"></div>

            <div id="hotel"></div>
          </div>


        </div>


        <div class="row">
          <div class="col-sm-6">
            <div class="content-element">
                <div class="loca-info">

                     <div class="faq">
                        <div class="accordion">

                            <!--start:accordion-->
                            <div class="part">
                                <div class="head">
                                    <i class="fa fa-question-circle"></i>
                                    <!--question icon-->

                                    Check Hotels
                                    <!--put headline here-->

                                    <div class="description desk-1" >
                                        
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

                                <div class="head">
                                    <i class="fa fa-question-circle"></i>
                                    <!--question icon-->

                                    Check Distance
                                    <!--put headline here-->
                                    <div class="description">
                                      <p>
                                        <span>Total distance :</span>
                                        <span></span>
                                      </p>

                                      <p>
                                        <span>Time :</span>
                                        <span></span>
                                      </p>
                                    </div>
                                    
                                </div>

                               

                            </div>
                            <!--end ".part"-->
                        </div>
                    </div>
                    
                </div>
            </div>
          </div>
          <p id="station_details" style="display: none"></p>

          <div class="col-sm-6">


            <p>Search By Time</p>
            <!-- Dropdown Trigger -->
           

            <!-- Dropdown Structure -->
            <select name="" id="search_by_time">
              <option value="1">1 hour</option>
              <option value="2">2 hour</option>
              <option value="3">3 hour</option>
              <option value="4">4 hour</option>
              <option value="5">5 hour</option>
            </select>


            <h4>Result Found</h4>


            <div class="result_found">
              
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
                	'home' => route('visiting-places', ['area_code' => '#area_code#']),
                  
                    'lat' => $lat,
                    'lng' => $lng,
                    'origin_lat' => $origin_lat,
                    'origin_lng' => $origin_lng
                ]);

        @endphp
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>

    <script type="text/javascript">
        var root = 'http://jsonplaceholder.typicode.com';

    </script>


    <script type="text/javascript">
        var data = window.home;
        already = 0;
        console.log(data);
        var nearestCopiese;
        var values = $('.pac_id').val();
        function initMap() {
        	var directionDisplay;
  			var directionsService = new google.maps.DirectionsService();
        	directionsDisplay = new google.maps.DirectionsRenderer();
		    var myOptions = {
		      mapTypeId: google.maps.MapTypeId.ROADMAP,
		      center: {
		      	lat: Number(data.lat),
		      	lng: Number(data.lng)
		      },
		      zoom: 12
		    }
		    var latLng  = {
                lat : Number(data.lat),
                lng: Number(data.lng)
            }
            var map = new google.maps.Map(document.getElementById('map'), {
              center: latLng,
              zoom: 8,
              mapTypeId: google.maps.MapTypeId.ROADMAP,
            });
		    directionsDisplay.setMap(map);

		    var start = window.home.origin_lat+','+window.home.origin_lng;
		    var end = window.home.lat+','+window.home.lng;
		    var request = {
		      origin:start, 
		      destination:end,
		      travelMode: google.maps.DirectionsTravelMode.DRIVING
		    };
		    directionsService.route(request, function(response, status) {
		    	console.log(response,'for direction')
		      if (status == google.maps.DirectionsStatus.OK) {
		        directionsDisplay.setDirections(response);
		        var myRoute = response.routes[0];
		        var txtDir = '';
		        for (var i=0; i<myRoute.legs[0].steps.length; i++) {
		          txtDir += myRoute.legs[0].steps[i].instructions+"<br />";
		        }
		        document.getElementById('station_details').innerHTML = txtDir;
		      }
		    });
            

            var hotel = new google.maps.Map(document.getElementById('map'), {
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
                console.log('asasssas',response)
              /*
                restaurent deatils will lopp here
              */
              console.log(already)
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




        var NearestCopies;
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
                NearestCopies = sorts;

               for(var i = 0; i < sorts.length; i++ ) {
                   var new_string = '<a href=place-details/'+sorts[i].location.lat+'/'+sorts[i].location.lng+'>'+'<li>' +sorts[i].name + ' (' + sorts[i].length.distance.text + ',' + sorts[i].length.duration.text + ')' + '</li></a>' ;
                    $('#nearest_place').append(new_string)
                }
            })
        }

        
       
       $('#search_by_time').on('change',function(){
          
          var val = $(this).val(); 
          findNearPlaceByTime(NearestCopies, val)
        });

        function findNearPlaceByTime(param, params){
          var getOnther = [];
          params = (params*2+Math.floor(params/2))*60*60;
          param.map(function(item){
            if(item.length.duration.value < params){
              getOnther.push(item)
            }
          })





           for(var i = 0; i < getOnther.length; i++ ) {

            $('.result_found').append('<div class="each_result'+'"></div>')
             // var new_string = '<a href=place-details/'+getOnther[i].location.lat+'/'+getOnther[i].location.lng+'>'+'<li>' +getOnther[i].name + ' (' + getOnther[i].length.distance.text + ',' + getOnther[i].length.duration.text + ')' + '</li></a>' ;
             //  $('#nearest_place').append(new_string)
          }


          $('.each_result').each(function(i){
            $(this).append('<p>Name:'+getOnther[i].name+'</p><p>Distance:'+getOnther[i].length.distance.text+'</p><p>Duration:'+getOnther[i].length.duration.text+'</p>')
          })

          $('.each_result').css({
            'box-shadow':'0 0 5px 0 rgba(0,0,0,0.2)',
            'margin-top':'15px',
            'padding':'10px 15px'
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

        var input = (document.getElementById('pac-input'));
              var autocomplete = new google.maps.places.Autocomplete(input);
             

              autocomplete.addListener('place_changed', function() {
                
                var place = autocomplete.getPlace();

                var getlat = place.geometry.location.lat();
                var getlng = place.geometry.location.lng();
                var a = 'http://hackathon.dev/place-details/'+window.home.origin_lat+'/'+window.home.origin_lng+'/'+getlat+'/'+getlng;


                window.location.href = a;

                  console.log(a);
                
                    place.address_components.map(function(addr){
                        addr.types.map(function(types){
                            if(types === 'administrative_area_level_2'){
                                pos.area_code = addr.short_name;
                            }
                        })
                    });

                if (!place.geometry) {
                  window.alert("No details available for input: '" + place.name + "'");
                  return;
                }
              });
        }

         
    </script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWURC1EHNgmcSScwpIYdegYYcqoUKGDdo&libraries=places&callback=initMap"></script>
</body>
</html>