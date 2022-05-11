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
    <form action="movie" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" value="{{old('name')}}">
        <textarea name="description">{{old('description')}} </textarea>
        <input type="file" name="poster" accept="image/*">
        <input type="number" name="price">
        <input type="date" name="date">

        @forelse($categories as $index => $category)
            <input name="categories[{{$index}}][category_id]" type="checkbox" value="{{$category->id}}">{{$category->name}}
        @empty
            No category
        @endforelse
        @forelse($languages as $index => $language)
        <input name="languages[{{$index}}][language_id]" type="checkbox" value="{{$language->id}}">{{$language->name}}
    @empty
        No language
    @endforelse
    @forelse($countries as $index => $country)
    <input name="countries[{{$index}}][country_id]" type="checkbox" value="{{$country->id}}">{{$country->name}}
@empty
    No country
@endforelse
        <input type="submit" value="Create">
    </form>
@endsection
