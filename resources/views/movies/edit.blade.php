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
        <input type="text" name="name">
        <textarea  name="description"> </textarea>
        <input type="file" name="poster" accept="image/*">
        <input type="number" name="price">
        <input type="date" name="date">
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
