@extends('layouts.frontend')

@section('meta-tags')
	{{-- For Facebook --}}
	{{-- <meta property="fb:app_id"                  content="237986806787117"> --}}
	<meta property="og:url"                     content="{{ route('post.single',['slug' => $post->slug ]) }}" />
	<meta property="og:type"                    content="website" />
	<meta property="og:title"                   content="{{ $post->title }}" />
	<meta property="og:description"             content="{{ $post->shortnote }}"/>
	<meta property="og:image"                   content="{{ asset($post->featured) }}" />
	<meta property="og:image:width"             content="700" />
	<meta property="og:image:height"            content="450" />
	{{-- For Twitter --}}
	<meta name="twitter:card" 						content="summary_large_image">
	<meta name="twitter:site" 						content="{{ $post->user->profile->twitter }}">
	<meta name="twitter:title" 					content="{{ $post->title }}">
	<meta name="twitter:description" 				content="{{ $post->shortnote }}">
	<meta name="twitter:creator" 					content="{{ $post->user->profile->twitter }}">
	<meta name="twitter:image" 					content="{{ $post->featured }}">
	<meta name="twitter:domain" 					content="teatime.karacraft.com">
@endsection

@section('contents')
<div class="row ">
	<!-- Single Post Data -->
	{{-- <div class="col-lg-8 col-md-8 col-sm-12 shadow mt-4 mb-4 bg-white"> --}}
	<div class="col-lg-8 col-md-8 col-sm-12 single-post">
		
		<!-- Title -->
		<div class="single-post-heading">
			@if($post->urdu == 0)
			<h2>{{$post->title}}
				<br>
				<small>{{ $post->shortnote }}</small>
			</h2>
			@else
			<h1 class="urdu-heading">{{$post->title}}
				<br>
				<small>{{ $post->shortnote }}</small>
			</h1>
			@endif
		</div>

		<!-- Author / Date/Time -->
		<div class="single-post-author">
			<a href="{{ route('author.posts',['slug' => $post->user->slug]) }}">
				<i class="fas fa-pen-alt fa-fw"></i>
				{{ $post->user->name }} 
			</a>
			
			{{-- <a href="{{ $post->user->profile->twitter }}" target="_blank" class="single-post-author-followme">
				Follow Me <i class="fab fa-twitter"></i>
			</a> --}}
			
			@if ($post->views())
			<span style="margin-left:20px">
				<i class="fas fa-eye"></i>
				{{ $post->views->count() }}
			</span>
			@endif

			<span class="float-right single-post-date">Posted on {{ $post->created_at->toFormattedDateString() }}</span>
		</div>
		
		<!-- Preview Image -->
		<div class="text-center">
			<img class="single-post-img" src="{{ $post->featured }}" alt="{{ $post->title }}">
		</div>

		<!-- Post Content -->
		@if($post->urdu == 0)
			<div class="single-post-content">
			{!! $post->content !!}
			</div>
		@else
			<div class="single-post-content">
			{!! $post->content !!}
			</div>
		@endif

		<!-- Go to www.addthis.com/dashboard to customize your tools --> 
		<div class="text-center mt-5 mb-5">
			<div class="addthis_inline_share_toolbox"></div> 
		</div>

		{{-- Tags --}}
		@include('includes.posttags')
		
		{{-- Pagination --}}
		@include('includes.postpagination')

		{{-- Add Author Profile --}}
		@include('includes.profile')

		<!-- Comments Form -->
		<div class="card ml-2 mr-2 border-0">
		<h5 class="card-header bg-secondary text-white">Leave a comment!</h5>
			<div class="card-body">
				@include('includes.disqus')
			</div>
		</div>

		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<div class="addthis_relatedposts_inline"></div>
            

	</div>
	<!-- Single Post Ends Here -->

	<!-- Side Column -->
	<div class="col-lg-4 col-md-4 col-sm-12">

		@include('includes.search')
		
		@include('includes.categories')
		@include('includes.tags')
		@include('includes.sidewidget')

	</div>
	<!-- Side Column Ends Here -->
	
</div>
@endsection
