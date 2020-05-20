@extends('layouts.admin')

@section('title','Industry Management')




@section('content')

    <div class="jumbotron">
        <h1 class="display-4">{{$currencies->CurrencyName}}</h1>
        <p class="lead">{{$currencies->CurrencyRate}}</p>
        <hr class="my-4">

    </div>


@endsection
