@extends('welcome')
@section('Title', 'All Movies')
@section('content')
    <a href="{{route("add_movie")}}">{{__('ADD_MOVIE')}}</a>
    <a href="{{route("add_movie")}}">{{__('validation.accepted')}}</a>
    <table>
    @forelse($movies as $movie)
            <tr>
                <td>{{$movie->name}}</td>
                <td>{{$movie->description}}</td>
                <td>
                    @auth<a href="/movie/{{$movie->id}}">Edit</a>
                    @endauth
                </td>
            </tr>
    @empty
        <p>No data</p>
    @endforelse


{{--@foreach($movies as $movie)--}}

{{--       <tr>--}}
{{--          <td>{{$movie['name']}}</td>--}}
{{--          <td>{{$movie['desc']}}</td>--}}
{{--       </tr>--}}

{{--@endforeach--}}

    </table>
@endsection

