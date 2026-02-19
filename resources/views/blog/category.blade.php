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
                <div class="col-12">
                    <h1 class="text-left">Result By <em>"{{ $category->category_name }}"</em></h1>
                </div>
                @forelse ($posts as $post)
                    @include('layouts.partials.blog-list')
                @empty
                    <div class="col-12">
                        <div class="text-center">
                            <h1>No post available</h1>
                        </div>
                    </div>
                @endforelse
                {{ $posts->links() }}

            </div><!-- .main-page-wrapper -->
        </div> <!-- end row -->
    </div>
@endsection
@section('scripts')

@endsection
