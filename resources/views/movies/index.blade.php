@extends('welcome')
@section('Title', 'All Movies')
@section('content')
    <a href="{{route("add_movie")}}">{{__('ADD_MOVIE')}}</a>
    <table>
    @forelse($movies as $movie)
            <tr>
                <td>{{$movie->name}}</td>
                <td>{{$movie->description}}</td>
                <td>
                    @auth<a href="/movie/{{$movie->id}}/edit">
                        {{__('EDIT')}}
                    </a>
                    @endauth
                    <a href="/movie/{{$movie->id}}">
{{--                    {{trans_choice('apples', 0)}}--}}
                        {{__('SHOW')}}
                    </a>
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

