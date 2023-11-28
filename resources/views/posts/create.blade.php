@extends('layouts.app')

@section('content')

    <div class="comment-form-wrap pt-5">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <h3 class="mb-5">Create Post</h3>
        <form action="{{route('post.store')}}" method="POST" class="p-5 bg-light" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="message">Title</label>
                <input type="text" placeholder="Title ..." name="title" value="{{old('title')}} " class="form-control"
                       id="title">
            </div>
            <div class="form-group">
                <label for="message">Description</label>
                <textarea placeholder="Description ..." name="description" value="{{old('description')}}" id="message"
                          cols="30"
                          rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <select name="category" class="form-select" aria-label="Default select example">
                    <option selected>Category menu</option>
                    @foreach($categories as $category)
                    <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="file" name="image" value="{{old('image')}} " class="form-control"
                       id="image">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Create Post" class="btn btn-primary">
            </div>

        </form>
    </div>
@endsection
