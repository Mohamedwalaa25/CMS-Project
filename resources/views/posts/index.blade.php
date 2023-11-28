@extends('layouts.app')

@section('content')
    @if (\Session::has('delete'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('delete') !!}</li>
            </ul>
        </div>
    @endif
    <!-- Start retroy layout blog posts -->
    <section class="section bg-light">
        <div class="container">
            <div class="row align-items-stretch retro-layout">
                <div class="col-md-4">
                    @foreach($posts as $post)
                        <a href="{{route('posts.single',$post->id)}}" class="h-entry mb-30 v-height gradient">

                            <div class="featured-img"
                                 style="background-image: url('{{asset('assets/images/'.$post->image.'')}}');"></div>

                            <div class="text">
                                <span class="date">{{$post->created_at}}</span>
                                <h2>{{$post->category}}</h2>
                            </div>
                        </a>
                    @endforeach

                </div>
                <div class="col-md-4">
                    @foreach($postsOne as $SinglePost)
                        <a href="{{route('posts.single',$SinglePost->id)}}" class="h-entry img-5 h-100 gradient">

                            <div class="featured-img"
                                 style="background-image: url('{{asset('assets/images/'.$SinglePost->image)}}');"></div>

                            <div class="text">
                                <span class="date"> {{$SinglePost->created_at}} </span>
                                <h2>{{$SinglePost->category}}</h2>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="col-md-4">
                    @foreach($postsTwo as $SingleTwo)
                        <a href="{{route('posts.single',$SingleTwo->id)}}" class="h-entry mb-30 v-height gradient">

                            <div class="featured-img"
                                 style="background-image: url('{{asset('assets/images/'.$SingleTwo->image)}}');"></div>

                            <div class="text">
                                <span class="date">{{$SinglePost->created_at}}</span>
                                <h2>{{$SinglePost->category}}</h2>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <!-- Start posts-entry -->
    <section class="section posts-entry">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Business</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div>
            <div class="row g-3">
                <div class="col-md-9">
                    <div class="row g-3">
                        @foreach($postBusiness as $business)
                            <div class="col-md-6">
                                <div class="blog-entry">
                                    <a href="{{route('posts.single',$business->id)}}" class="img-link">
                                        <img src="{{asset('assets/images/'.$business->image.'')}}" alt="Image"
                                             class="img-fluid">
                                    </a>
                                    <span class="date">{{$business->created_at}}</span>
                                    <h2><a href="{{route('posts.single',$business->id)}}">Thought you loved Python? Wait
                                            until you meet Rust</a></h2>
                                    <p>{{$business->description}}.</p>
                                    <p><a href="{{route('posts.single',$business->id)}}"
                                          class="btn btn-sm btn-outline-primary">Read More</a></p>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="col-md-3">
                    @foreach($postBus as $post)
                        <ul class="list-unstyled blog-entry-sm">
                            <li>
                                <span class="date">{{$post->created_at}}</span>
                                <h3><a href="{{route('posts.single',$post->id)}}">Don’t assume your user data in the
                                        cloud is safe</a></h3>
                                <p>{{route('posts.single',$post->id)}}.</p>
                                <p><a href="{{route('posts.single',$post->id)}}" class="read-more">Continue Reading</a>
                                </p>
                            </li>
                            @endforeach()

                        </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End posts-entry -->
    <section class="section posts-entry posts-entry-sm bg-light">
        <div class="container">
            <div class="row">
                @foreach($RandomPosts as $random)
                    <div class="col-md-6 col-lg-3">
                        <div class="blog-entry">
                            <a href="{{route('posts.single',$random->id)}}" class="img-link">
                                <img src="{{asset('assets/images/'.$random->image.'')}}" alt="Image" class="img-fluid">
                            </a>
                            <span class="date">$random->created_at</span>
                            <h2><a href="{{route('posts.single',$random->id)}}">{{substr($random->title , 0,20) }}</a>
                            </h2>
                            <p>{{substr($random->description , 0,20) }}.</p>

                            <p><a href="{{route('posts.single',$random->id)}}" class="read-more">Continue Reading</a>
                            </p>

                        </div>
                    </div>
        @endforeach

    </section>

    <section class="section posts-entry">
        <div class="container">
            <div class="row mb-4">

                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Culture</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div>

            <div class="row g-3">
                <div class="col-md-9 order-md-2">
                    <div class="row g-3">
                        @foreach($CulturePosts as $culture)
                            <div class="col-md-6">
                                <div class="blog-entry">
                                    <a href="{{route('posts.single',$culture->id)}}" class="img-link">
                                        <img src="{{asset('assets/images/'.$culture->image.'')}}" alt="Image"
                                             class="img-fluid">
                                    </a>
                                    <span class="date">{{$culture->created_a}}</span>
                                    <h2>
                                        <a href="{{route('posts.single',$culture->id)}}">{{substr($culture->title, 1,30)}}</a>
                                    </h2>
                                    <p>{{substr($culture->description, 1,50)}}.</p>
                                    <p><a href="{{route('posts.single',$culture->id)}}"
                                          class="btn btn-sm btn-outline-primary">Read More</a></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
                    @foreach($CulturePostsThree as $post)
                        <ul class="list-unstyled blog-entry-sm">
                            <li>
                                <span class="date">{{$post->created_at}}</span>
                                <h3><a href="{{route('posts.single',$culture->id)}}">{{substr($post->title, 1,30)}}</a>
                                </h3>
                                <p>{{substr($post->description, 1,50)}}.</p>
                                <p><a href="{{route('posts.single',$culture->id)}}" class="read-more">Continue
                                        Reading</a></p>
                            </li>
        @endforeach
    </section>

    <section class="section">
        <div class="container">

            <div class="row mb-4">

                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Politics</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div>

            <div class="row">
                @foreach($PoliticsPosts as $posts)
                    <div class="col-lg-4 mb-4">
                        <div class="post-entry-alt">
                            <a href="{{route('posts.single',$posts->id)}}" class="img-link"><img
                                    src="{{asset('assets/images/'.$posts->image.'')}}" alt="Image"
                                    class="img-fluid"></a>
                            <div class="excerpt">


                                <h2><a href="{{route('posts.single',$posts->id)}}">{{substr($posts->title, 1,20)}}</a>
                                </h2>
                                <div class="post-meta align-items-center text-left clearfix">
                                    <figure class="author-figure mb-0 me-3 float-start"><img
                                            src="{{asset('assets/images/person_1.jpg')}}"
                                            alt="Image"
                                            class="img-fluid"></figure>
                                    <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                    <span>&nbsp;-&nbsp; {{$posts->created_at}}</span>
                                </div>

                                <p>{{substr($posts->description, 1,25)}}.</p>
                                <p><a href="{{route('posts.single',$posts->id)}}" class="read-more">Continue Reading</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach()
            </div>

        </div>
    </section>

    <div class="section bg-light">
        <div class="container">

            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Travel</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div>

            <div class="row align-items-stretch retro-layout-alt">
                @foreach($TravelPosts as $travel)
                    <div class="col-md-5 order-md-2">
                        <a href="{{route('posts.single',$travel->id)}}" class="hentry img-1 h-100 gradient">
                            <div class="featured-img"
                                 style="background-image: url('{{asset('assets/images/'.$travel->image.'')}}');"></div>
                            <div class="text">
                                <span>{{$travel->created_at}}</span>
                                <h2>{{substr($travel->title,1,25)}}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach


                <div class="col-md-7">
                    @foreach($TravelPostsOne as $travel)
                        <a href="{{route('posts.single',$travel->id)}}" class="hentry img-2 v-height mb30 gradient">
                            <div class="featured-img"
                                 style="background-image: url('{{asset('assets/images/'.$travel->image.'')}}');"></div>
                            <div class="text text-sm">
                                <span>{{$travel->created_at}}</span>
                                <h2>{{substr($travel->title, 1,20)}}</h2>
                            </div>
                        </a>
                    @endforeach

                    <div class="two-col d-block d-md-flex justify-content-between">
                        @foreach($TravelPostsTwo as $travels)
                            <a href="{{route('posts.single',$travels->id)}}" class="hentry v-height img-2 gradient">
                                <div class="featured-img"
                                     style="background-image: url('{{asset('assets/images/'.$travels->image.'')}}');"></div>
                                <div class="text text-sm">
                                    <span>{{$travels->created_at}}</span>
                                    <h2>{{substr($travels->title, 1,20)}}</h2>
                                </div>

                            </a>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
