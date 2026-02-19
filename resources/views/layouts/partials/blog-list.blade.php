<div class="col-sm-6 col-md-4 col-lg-4 mb-3">
    <div class="card card-wrapper">
        <a href="{{ route('frontend.blog.category', $post->category->slug) }}" title="{{ $post->category->category_name }}"><span class="badge bg-success category">{{ $post->category->category_name }}</span></a>
        <div class="card-body">
            <a href="{{ route('frontend.blog.details', $post->slug) }}" title="{{ $post->title }}">
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid w-100 rounded mb-2">
            </a>
            <a href="{{ route('frontend.blog.details', $post->slug) }}" style="font-weight:700; font-size:17px; " title="{{ $post->title }}"> {{ shorter($post->title, 60) }} </a>
            <div class="d-flex justify-content-between align-items-center">
                <span class="d-block">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                <span class="d-block"><b>By:</b> <em>{{ Setting()->author_name }}</em></span>
            </div>
        </div>
    </div>
</div>
