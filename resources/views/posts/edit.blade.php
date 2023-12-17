@extends('layouts.app')

@section('content')

    <div class="comment-form-wrap pt-5">

        <h3 class="mb-5">Edit Post</h3>
        <form action="{{route('post.update',$single->id)}}" method="POST" class="p-5 bg-light"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="message">Title</label>
                <input type="text" placeholder="Title ..." name="title" value="{{$single->title}} " class="form-control"
                       id="title">
            </div>
            <div class="form-group">
                <label for="message">Description</label>
                <textarea placeholder="Description ..." name="description" {{$single->description}} id="message"
                          cols="30"
                          rows="10" class="form-control">
                    {{$single->description}}
                </textarea>
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
                <input type="file" name="image" value="{{$single->image}} " class="form-control"
                       id="image">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Update Post" class="btn btn-primary">
            </div>

        </form>
    </div>
@endsection
