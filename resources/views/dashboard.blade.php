@extends('welcome')
@section('Title', 'Dashboard')
@section('content')
    <h1>Hello movies {{ $name }} {{ $id }}</h1>
    <a href="{{route('movie')}}">Movies</a>
@endsection