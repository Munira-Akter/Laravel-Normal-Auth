@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width:800px;">
                <div class="card-header">{{ __('profile') }} <a href="{{route('delete', $single_user -> id )}}" class="btn btn-sm btn-danger"> প্রোফাইল মুছে ফেলুন </a></div>

                <div class="card-body">
                    <img style="width:100%; height:300px;" src="/media/users/{{$single_user -> photo}}">
                    <table style="width:800px;" class="table">
                       
                            <tr>
                                <td>{{$single_user -> name}}</td>
                                <td>{{$single_user -> email}}</td>
                                <td>{{$single_user -> cell}}</td>
                                <td>{{$single_user -> gender}}</td>
                                <td>{{$single_user-> age}}</td>
                                <td>{{$single_user -> location}}</td>
                                <td><a href="{{route('edit', $single_user -> id )}}" class="btn btn-sm btn-warning"> প্রোফাইল পরিবর্তন</a></td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
