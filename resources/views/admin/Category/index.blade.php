@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                    @endif
                    @if(session('delete'))
                        <div class="alert alert-success">
                            {{ session('delete') }}
                        </div>
                    @endif
                        @if(session('update'))
                            <div class="alert alert-success">
                                {{ session('update') }}
                            </div>
                        @endif
                    <h5 class="card-title mb-4 d-inline">Categories</h5>
                    <a href="{{route('category.create')}}" class="btn btn-primary mb-4 text-center float-right">Create
                        Categories</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">update</th>
                            <th scope="col">delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td>{{$category->name}}</td>
                                <td><a href="{{route('category.edit',$category->id)}}" class="btn btn-warning text-white text-center ">Update
                                        Categories</a></td>
                                <td>
                                    <form method="post" action="{{route('category.delete',$category->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('category.delete',$category->id)}}"
                                           class="btn btn-danger  text-center ">Delete Categories</a>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
