@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width:800px;">
                <div class="card-header">{{ __('All Users') }}</div>

                <div class="card-body">
                    <table style="width:800px;" class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Cell</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Location</th>
                                <th>photo</th>
                                <th>Action</th>
                            </tr>
                            @foreach($all_user as $all_user)
                            <tr>
                                <td>{{$loop -> index +1 }}</td>
                                <td>{{$all_user -> name}}</td>
                                <td>{{$all_user -> email}}</td>
                                <td>{{$all_user -> cell}}</td>
                                <td>{{$all_user -> gender}}</td>
                                <td>{{$all_user -> age}}</td>
                                <td>{{$all_user -> location}}</td>
                                <td><img style="width:50px; height:35px;" src="/media/users/{{$all_user -> photo}}"></td>
                                <td><a href="{{route('profile' , $all_user -> id)}}" class="btn btn-sm btn-info">view</a></td>
                            </tr>
                            @endforeach

                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
