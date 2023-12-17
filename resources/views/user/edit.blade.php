@extends('layouts.app')

@section('content')

    <div class="comment-form-wrap pt-5">

        <h3 class="mb-5">Edit Profile</h3>
        <form action="{{route('user.update',$user->id)}}" method="POST" class="p-5 bg-light"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="message">Name</label>
                <input type="text" placeholder="Name ..." name="name" value="{{$user->name}} " class="form-control"
                       id="title">
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="message">Email</label>
                <input type="text" placeholder="Email ..." name="email" value="{{$user->email}} " class="form-control"
                       id="title">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="message">bio</label>
                <textarea placeholder="bio ..." name="bio" {{$user->bio}} id="message"
                          cols="30"
                          rows="10" class="form-control">
                    {{$user->bio}}
                </textarea>
                @error('bio')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="file" name="image" value="{{$user->image}} " class="form-control"
                       id="image">
                @error('image')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Update Profile" class="btn btn-primary">
            </div>

        </form>
    </div>
@endsection
