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
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
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
          <a href="#!name"><span class="white-text name">John Doe</span></a>
          <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div></li>
        <li><a href="#!">Home</a></li>
        <li><a href="#!">Visit Place</a></li>
    </ul>
    <div class="row">
        <div class="container-fluid">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons b small">menu</i></a>
        </div>
    </div>
    <!--/nav-->


    <!-- main-content -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-offset-2 col-xs-12 col-xs-offset-0 map-wrapper">
                <div id="current-location-map"></div>
            </div>
        </div>
    </div>
    
    

    <!--js file (same for every page)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWURC1EHNgmcSScwpIYdegYYcqoUKGDdo&amp;libraries=places&amp;callback=init">
  </script>
   </script>
    
</body>
</html>