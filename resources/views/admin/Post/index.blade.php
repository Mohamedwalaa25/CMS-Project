@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                @if(session('delete'))
                    <div class="alert alert-success">
                        {{ session('delete') }}
                    </div>
                @endif
                <h5 class="card-title mb-4 d-inline">Posts</h5>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">category</th>
                        <th scope="col">user</th>
                        <th scope="col">delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{substr($post->title,0,40)}}</td>
                        <td>{{$post->category}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>  <form method="post" action="{{route('admin_posts.delete',$post->id)}}">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('admin_posts.delete',$post->id)}}"
                                   class="btn btn-danger  text-center ">Delete Categories</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                </div>
        </div>
       <div class="d-flex justify-content-center">
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>
    </div>

</div>
@endsection
