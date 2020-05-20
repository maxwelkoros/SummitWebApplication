@extends('layouts.admin')

@section('title','Industry Management')




@section('content')

    <div class="jumbotron">
        <h1 class="display-4">{{$industry->Name}}</h1>
        <p class="lead">{{$industry->Details}}</p>
        <hr class="my-4">
        <p class="lead">
           {{$industry->Parent}}
        </p>
    </div>


@endsection
