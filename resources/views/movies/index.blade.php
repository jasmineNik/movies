@extends('welcome')
@section('Title', 'All Movies')
@section('content')
    <table>
    @forelse($movies as $movie)
            <tr>
                <td>{{$movie->name}}</td>
                <td>{{$movie->desc}}</td>
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

