@extends('layouts.app')
@section('content')
<h3 class="mb-4">Recent Post Entry</h3>
<div class="post-entry-footer">
    <ul>
        @foreach($result as $post)
        <li>
            <a href="{{route('posts.single',$post->id)}}">
                <img src="{{asset('assets/images/'.$post->image)}}" alt="Image placeholder" class="me-4 rounded">
                <div class="text">
                    <h4>{{$post->title}}</h4>
                    <div class="post-meta">
                        <span class="mr-2">{{$post->created_at}} </span>
                    </div>
                </div>
            </a>
        </li>
        <li>
        @endforeach
        </ul>
</div>
@endsection
