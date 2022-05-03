@extends('welcome')
@section('Title', 'All Movies')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('update-data/'.$movie->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" value="{{$movie->name}}">
        <textarea  name="description" value="{{$movie->description}}"> </textarea>
        <input type="file" name="poster" accept="image/*" value="{{$movie->poster}}">
        <input type="number" name="price" value="{{$movie->price}}">
        <input type="date" name="date" value="{{$movie->date}}">
        <select name="category" id="">
            @forelse($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @empty
                No category
            @endforelse
        </select>
        <input type="submit" value="Create">
    </form>
@endsection
