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
    <form action="{{route('movie_update')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" value="{{$movie->id}}" name="id">
        <input type="text" name="name" value="{{$movie->name}}">
        <textarea  name="description">{{ $movie->description }}</textarea>
        <input type="file" name="poster" accept="image/*">
        <input type="number" name="price" value="{{$movie->price?? 0}}">
        <input type="date" name="date" value="{{$movie->date}}">
            @forelse($categories as $index => $category)
            <input type="checkbox"
               @foreach($movie_categories as $movie_category)
                 {{$movie_category->id === $category->id? 'checked' : ''}}
               @endforeach
                   value="{{$category->id}}"
                   name="categories[{{$index}}][category_id]">{{$category->name}}
            @empty
                No category
            @endforelse
            @forelse($languages as $index => $language)
            <input type="checkbox"
               @foreach($movie_languages as $movie_language)
                 {{$movie_language->id === $language->id? 'checked' : ''}}
               @endforeach
                   value="{{$language->id}}"
                   name="languages[{{$index}}][language_id]">{{$language->name}}
            @empty
                No language
            @endforelse
        <input type="submit" value="Edit">
    </form>
@endsection
