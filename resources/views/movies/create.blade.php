@extends('welcome')
@section('Title', 'Add movie')
@section('content')
{{--    @error('name')--}}
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
        <fieldset>
            <legend>Acting</legend>
            <label for="">Actor</label>
            <select name="staff" id="">
                <option>Test 1</option>
                <option>Test 2</option>
                <option>Test 3</option>
            </select>
            <label>Role</label>
            <select name="roles" id="">
                <option>Role 1</option>
                <option>Role 2</option>
                <option>Role 3</option>
            </select>
        </fieldset>
        @forelse($categories as $index => $category)
            <input name="categories[{{$index}}][category_id]" type="checkbox" value="{{$category->id}}">{{$category->name}}
        @empty
            No category
        @endforelse

        <input type="submit" value="Create">
    </form>
@endsection
