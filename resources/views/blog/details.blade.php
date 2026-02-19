@extends('layouts.app')
@section('styles')
<style>
    .card-wrapper{
        position: relative;
    }
    .category{
        position: absolute;
        content: '';
        top: 0%;
        right: 0%;
        border-radius: 0px 5px 0px 12px;
        font-size: 16px;
        background-color: #BC6176 !important;

    }
</style>
@endsection
@section('content')
    <div class="main-page-wrapper">




        <!-- MAIN CONTENT AREA -->
        <div class="container">
            <div class="row content-layout-wrapper align-items-start">
                <div class="col-lg-8 mb-3">
                    <h1>{{ $post->title }}</h1>
                    <div class="d-flex justify-content-start align-items-center">
                        <span class="d-block">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                        <span class="d-block"> &nbsp; | &nbsp;  </span>
                        <a href="{{ route('frontend.blog.category', $post->category->slug) }}"><span class="d-block"><em>{{ $post->category->category_name }}</em></span></a>
                        <span class="d-block"> &nbsp; | &nbsp;  </span>
                        <span class="d-block"><b>By:</b> <em>{{ Setting()->author_name }}</em></span>
                    </div>

                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="my-3 border img-fluid w-100">

                    <div class="mb-4">
                        {!! $post->description !!}

                        <blockquote class="blockquote mt-4">
                            <p class="text-uppercase">authorized by <em>Admin</em></p>
                        </blockquote>
                    </div>
                </div>

                <div class="col-lg-4 mb-3">
                    <p class="border-bottom text-dark text-uppercase pb-1" style="font-weight:700; font-size:17px">Latest Update</p>

                    @foreach ($lposts as $lpost)
                        <div class="d-flex justify-content-start mb-3">
                            <a href="{{ route('frontend.blog.details', $lpost->slug) }}">
                                <img src="{{ asset($lpost->image) }}" alt="" class="img-fluid" style="width: 110px">
                            </a>
                            <div class="ms-2">
                                <a href="{{ route('frontend.blog.details', $lpost->slug) }}" style="font-weight: 700; font-size:15px">{{ shorter($lpost->title, 40) }}</a>
                                <div class="d-flex justify-content-start align-items-center">
                                    <small class="d-block">{{ Carbon\Carbon::parse($lpost->created_at)->diffForHumans() }}</small>
                                    <span class="d-block"> &nbsp; | &nbsp;  </span>
                                    <small class="d-block"><b>By:</b> <em>{{ Setting()->author_name }}</em></small>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </div>




            </div><!-- .main-page-wrapper -->
        </div> <!-- end row -->
    </div>
@endsection
@section('scripts')

@endsection
