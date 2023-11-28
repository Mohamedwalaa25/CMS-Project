@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">Login</h3>
                    <form method="POST" class="p-5 bg-light" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email *</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>


                        <label for="website">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                        </div>
                    </form>
                    {{--                        <!--     <div>--}}
                    {{--                            <input class="form-check-input" type="checkbox" name="remember"--}}
                    {{--                                   id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                    {{--                            <label class="form-check-label" for="remember">--}}
                    {{--                                {{ __('Remember Me') }}--}}
                    {{--                            </label>--}}



                    {{--                            @if (Route::has('password.request'))--}}
                    {{--                                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
                    {{--                                    {{ __('Forgot Your Password?') }}--}}
                    {{--                                </a>--}}
                    {{--                            @endif--}}
                    {{--                                    -->--}}
                </div>
            </div>
        </div>
    </div>



    </div>

@endsection
