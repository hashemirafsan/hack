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
    

    <!--/nav-->


    <!-- main-content -->
    <div class="row">
        <div class="container-fluid">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </div>

    <div class="container">
        <div class="col-sm-6">
            <div class="content-element">
                <div class="title text-center">
                    <h1>MAKE YOUR HOLYDAY GREAT</h1>
                </div>

                <div class="card-block">
                    <p>
                        <span>Your Current Location :</span>
                        <span>Sylhet</span>
                    </p>

                    <div class="popular-palces">
                        <p>Some Nearset Popular Places :</p>
                        <ol>
                            <li></li>
                        </ol>
                    </div>
                </div>

                <div class="loca-info">
                    <p class="info">
                        Nearest Hotels & Restaurants
                    </p>
                </div>
            </div>
        </div>


        <div class="col-sm-6">
             <div class="map-section">
                <ul class="nav nav-pills">
                <h1>Hello a asasas</h1>
                    <li class="active"><a data-toggle="tab" href="#map-view">Map</a></li>
                    <li><a data-toggle="tab" href="#road-view">Steet View</a></li>
                    <li><a data-toggle="tab" href="#search-by-time">Search By Time</a></li>
                </ul>

                <div class="tab-content">
                  <div id="map-view" class="tab-pane fade in active">
                    <h3>HOME</h3>
                    <p>Some content.</p>
                  </div>
                  <div id="road-view" class="tab-pane fade">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                  </div>
                  <div id="search-by-time" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                  </div>
                </div>
            </div>
        </div>

    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>

    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>