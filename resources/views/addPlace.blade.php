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

	<!--font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.6.3/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!--plugins-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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
          <a href="#!name"><span class="white-text name"></span></a>
          <a href="#!email"><span class="white-text email"></span></a>
        </div></li>
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('add-place.get')}}">Add Place</a></li>
        <li><a id="logout" href="#!">Logout</a></li>
        
    </ul>
    

    <!--/nav-->


	 <div class="main-search-container" data-background-image="images/main-search-background-01.jpg">
		<div class="main-search-inner">

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2>Add Beautiful Places You Know</h2>
						<h4>Expolore top-rated attractions, activities and more</h4>

						<div class="main-search-input">

							<div class="main-search-input-item">
								<input  placeholder="What are you looking for?" value="" id="pac-input"/>
							</div>

							

							

							<button class="button add_location_btn">Add Location</button>

						</div>
						
						<a href="{{ route('home') }}">
							<div class="bag text-center" style="margin-top: 15px;">
								<button class="button back_btn">BACK</button>
							</div>
						</a>

						
					</div>
				</div>
			</div>

		</div>
	</div>


    
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>

   
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>

    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWURC1EHNgmcSScwpIYdegYYcqoUKGDdo&amp;libraries=places&amp;callback=autocomplete">

	</script>


	<script>
		var pos = {
			lat:'',
			lng:'',
			area_code:''
		}
		function autocomplete() {
       
		        var input = (document.getElementById('pac-input'));
		        var autocomplete = new google.maps.places.Autocomplete(input);
		       

		        autocomplete.addListener('place_changed', function() {
		          
		          var place = autocomplete.getPlace();

		          pos.lat = place.geometry.location.lat();
		          pos.lng = place.geometry.location.lng();

		          
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

		$('.add_location_btn').on('click',function(){
			axios.post('http://hackathon.dev/add-place',pos)
				  .then(function(response){
				  	if(response){
				  		toastr.success(response.data.message)
				  	}
				  })
				  .catch(function(e){
				  	console.log(e.response);
				  })
		})
	</script>

	
    
</body>
</html>