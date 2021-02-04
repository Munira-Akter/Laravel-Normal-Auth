@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width:800px;">
                <div class="card-header">{{ __('profile') }}</div>

                

                <div class="card-body">
                    <img style="width:100%; height:200px;" src="/media/users/{{Auth::user() -> photo}}">
                    <table style="width:800px;" class="table">
                       
                            <tr>
                                <td>{{Auth::user() -> name}}</td>
                                <td>{{Auth::user() -> email}}</td>
                                <td>{{Auth::user() -> cell}}</td>
                                <td>{{Auth::user() -> gender}}</td>
                                <td>{{Auth::user()-> age}}</td>
                                <td>{{Auth::user() -> location}}</td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
