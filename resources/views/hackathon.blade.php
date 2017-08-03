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
    <div>

        <div id="app">
            <router-view name="default"></router-view>
        </div>

    </div>
    <script src={{mix('js/hackathon.js')}} ></script>
</body>
</html>