@extends('welcome')
@section('Title', $movie->name)
@section('content')

<img style="height: 200px; width: 200px" src="{{$movie->poster?asset($movie->poster):asset('images/no_poster.png')}}" alt="">
@endsection
