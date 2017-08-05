@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tourism Places</div>

                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Area Code</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Added By</th>
                                <th>Added On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        @foreach($touristPlaces as $place)
                        <tr>
                            <td>
                                {{ $place->area_code }}
                            </td>
                            <td>
                                {{ $place->lat }}
                            </td>
                            <td>
                                {{ $place->lng }}
                            </td>
                            <td>
                                {{ $place->user->email }}
                            </td>
                            <td>
                                {{ date('M j, Y', strtotime($place->created_at)) }}
                            </td>
                            <td>
                                <div>
                                    <form method="get" action="{{route('approve-place', $place->id)}}" style="display: inline-block;">
                                        <input type="submit" value="Approve" role="button" class="btn btn-success btn-xs">
                                    </form>
                                    <form method="get" action="{{route('delete-place', $place->id)}}" style="display: inline-block;">
                                        <input type="submit" value="Delete" role="button" class="btn btn-danger btn-xs">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
