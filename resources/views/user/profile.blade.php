@extends('layouts.app')

@section('content')

    <div class="site-cover site-cover-sm same-height overlay single-page"
         style="margin-top:-25px;  background-image: url('{{asset('assets/images/hero_3.jpg')}}');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-6">
                    <div class="post-entry text-center">

                        <div class="post-meta align-items-center text-center">
                           <img style="width: 150px; height:150px;  border-radius: 50% 50%;"
                                    src="{{asset('assets/images/'.$profile->image)}}"
                                    alt="Image" class="img-fluid">
                        </div>
                            <h1 class="mb-4">{{$profile->name}}</h1>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">

                    <div class="post-content-body">
                        <p>
                            MY Bio:
                            <br>
                            <br>

                            {{$profile->bio}}
                        </p>
                    </div>



                    <!-- END main-content -->
                </div>
                    <div class="col-md-12 col-lg-4 sidebar">


                        <div class="sidebar-box">
                            <h3 class="heading">Popular Posts</h3>
                            <div class="post-entry-sidebar">
                                <ul>
                                    @foreach($postprofile as $post)
                                        <li>
                                            <a href="{{route('posts.single',$post->id)}}">
                                                <img src="{{asset('assets/images/'.$post->image)}}"
                                                     alt="Image placeholder"
                                                     class="me-4 rounded">
                                                <div class="text">
                                                    <h4>{{substr($post->title,1,40)}}...</h4>
                                                    <div class="post-meta">
                                                        <span class="mr-2">{{$post->created_at}}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- END sidebar-box -->


                    </div>
                    <!-- END sidebar -->

                </div>
            </div>
    </section>


@endsection()

