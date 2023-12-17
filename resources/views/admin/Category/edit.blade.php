@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Update Categories</h5>
                <form method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Email input -->
                    <div class="form-outline mb-4 mt-4">
                        <input type="text" name="name" value=" {{ $category->name }}" id="form2Example1" class="form-control" placeholder="name" />
                        @error('name')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>


                </form>

            </div>
        </div>
    </div>
</div>
@endsection
