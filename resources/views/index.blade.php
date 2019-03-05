@extends('layouts.frontend')

@section('css')
	<!-- Owl carouse -->
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">    
@endsection

@section('meta-tags')
	{{-- For Facebook --}}
	{{-- <meta property="fb:app_id"                  content="237986806787117"> --}}
	<meta property="og:url"                     content="{{ route('index') }}" />
	<meta property="og:type"                    content="website" />
	<meta property="og:title"                   content="{{ config('app.name') }}" />
	<meta property="og:description"             content="Teatime for discusison, views, thoughts and socializing"/>
	<meta property="og:image"                   content="{{ asset('svg/teatime.svg') }}" />
	<meta property="og:image:width"             content="150" />
	<meta property="og:image:height"            content="150" />
	{{-- For Twitter --}}
	<meta name="twitter:card" 					content="summary_large_image">
	<meta name="twitter:site" 					content="teatime.karacraft.com">
	<meta name="twitter:title" 					content="{{ config('app.name') }}">
	<meta name="twitter:description" 			content="Teatime for discusison, views, thoughts and socializing">
	<meta name="twitter:creator" 				content="Teatime">
	<meta name="twitter:image" 					content="{{ asset('svg/teatime.svg') }}">
	<meta name="twitter:domain" 				content="teatime.karacraft.com">
@endsection
	

@section('contents')

{{-- First Post Starts Here --}}
<div class="row">

    <div class="col-lg-12 text-center">

		<article>
			
			{{-- Post Image --}}
			<div class="text-center">
				<a href="{{ route('post.single',['slug' => $first_post->slug]) }}">
					<img src="{{ asset($first_post->featured) }}" alt="{{ $first_post->title }}">
				</a>

			</div>
			
			{{-- Post Title --}}
			@if($first_post->urdu == 1)
				<header class="urdu">
					<a href="{{ route('post.single',['slug' => $first_post->slug]) }}" >{{ $first_post->title }}</a>
				</header>
			@else
				<header>
					<a href="{{ route('post.single',['slug' => $first_post->slug]) }}" >{{ $first_post->title }}</a>
				</header>
			@endif

			{{-- Visual Logs --}}
			@if($first_post->category->id == 3)
				<i class="fas fa-video fa-2x mt-2" title="This is a video log"></i>
			@endif
			
			<div class="article_info">
				{{-- Views --}}
				@if($first_post->views())
				<span class="article_views"  title="Total Views of this post">
					<i class="fas fa-eye"></i>
						{{ $first_post->views->count()}}
				</span>
				@endif

				{{-- Date --}}
				<span class="article_date">
					<i class="fas fa-clock"></i>
					{{ $first_post->created_at->toFormattedDateString() }}
				</span>
				
				{{-- Tags --}}
				<span class="article_tags">
					<i class="fas fa-tags"></i>
					@foreach ($first_post->tags as $tag)
						<a href="{{ route('tag.single',['id' => $tag->id ]) }}" class="py-2">{{ $tag->tag }}</a>
					@endforeach 
				</span>

				{{-- Comments --}}
				<i class="fas fa-comment"></i>
				<span class="article_comments disqus-comment-count" data-disqus-identifier="{{ $first_post->slug }}">
				</span>

			</div>

		</article>
	
	</div>

</div>
{{-- First Post Ends Here --}}

{{-- 2nd & 3rd Posts  --}}
<div class="row mb-4">

    {{-- 2nd Post --}}
    <div class="col-lg-6 col-sm-12 col-md-12 text-center">
      
      	<article>
		
			{{-- Post Image --}}
			<div class="text-center">
				<a href="{{ route('post.single',['slug' => $second_post->slug]) }}">
					<img src="{{ asset($second_post->featured) }}" alt="{{ $second_post->title }}">
				</a>
			</div>
			
			{{-- Post Title --}}
			@if($second_post->urdu == 1)
				<header class="urdu">
					<a href="{{ route('post.single',['slug' => $second_post->slug]) }}" >{{ $second_post->title }}</a>
				</header>
			@else
				<header>
					<a href="{{ route('post.single',['slug' => $second_post->slug]) }}" >{{ $second_post->title }}</a>
				</header>
			@endif
			
			{{-- Visual Logs --}}
			@if($second_post->category->id == 3)
				<i class="fas fa-video fa-2x mt-2" title="This is a video log"></i>
			@endif

			<div class="article_info">

				{{-- Views --}}
				@if($second_post->views())
				<span class="article_views">
					<i class="fas fa-eye"></i>
						{{ $second_post->views->count() }}
				</span>
				@endif

				{{-- Date --}}
				<span class="article_date">
				<i class="fas fa-clock"></i>
				{{ $second_post->created_at->toFormattedDateString() }}
				</span>
				
				{{-- Tags --}}
				<span class="article_tags">
				<i class="fas fa-tags"></i>
					@foreach ($second_post->tags as $tag)
					<a href="{{ route('tag.single',['id' => $tag->id ]) }}" class="py-2">{{ $tag->tag }}</a>
					@endforeach 
				</span>

				{{-- Comments --}}
				<i class="fas fa-comment"></i>
				<span class="article_comments disqus-comment-count" data-disqus-identifier="{{ $second_post->slug }}">
				</span>
				
			</div>

		</article>

    </div>

    {{-- Third Post --}}
    <div class="col-lg-6 col-sm-12 col-md-12 text-center">

        <article>
			
			{{-- Post Image --}}
			<div class="text-center">
				<a href="{{ route('post.single',['slug' => $third_post->slug]) }}">
					<img src="{{ asset($third_post->featured) }}" alt="{{ $third_post->title }}">
				</a>
			</div>
		
			{{-- Post Title --}}
			@if($third_post->urdu == 1)
				<header class="urdu">
					<a href="{{ route('post.single',['slug' => $third_post->slug]) }}" >{{ $third_post->title }}</a>
				</header>
			@else
				<header>
					<a href="{{ route('post.single',['slug' => $third_post->slug]) }}" >{{ $third_post->title }}</a>
				</header>
			@endif

			{{-- Visual Logs --}}
			@if($third_post->category->id == 3)
				<i class="fas fa-video fa-2x mt-2" title="This is a video log"></i>
			@endif

			<div class="article_info">

				{{-- Views --}}
				@if($third_post->views())
				<span class="article_views">
					<i class="fas fa-eye"></i>
						{{ $third_post->views->count()}}
				</span>
				@endif

				{{-- Date --}}
				<span class="article_date">
				<i class="fas fa-clock"></i>
				{{ $third_post->created_at->toFormattedDateString() }}
				</span>
				
				{{-- Tags --}}
				<span class="article_tags">
				<i class="fas fa-tags"></i>
					@foreach ($third_post->tags as $tag)
					<a href="{{ route('tag.single',['id' => $tag->id]) }}" class="py-2">{{ $tag->tag }}</a>
					@endforeach 
				</span>

				{{-- Comments --}}
				<i class="fas fa-comment"></i>
				<span class="article_comments disqus-comment-count" data-disqus-identifier="{{ $third_post->slug }}">
				</span>

			</div>
        </article>

    </div>

</div>
{{-- 2nd & 3rd Posts Ends Here --}}

{{-- Politics  --}}
@if ($politics->count()>0)
  	<div class="category-list mb-4 pl-4">
    	Politics
  	</div>
	{{-- Owl Carousel --}}
	<div class="owl-carousel owl-theme">
		@foreach($politics as $item)
		<div class="item">
				
			<article>
		
				{{-- Post Image --}}
				<div class="text-center">
					<a href="{{ route('post.single',['slug' => $item->slug]) }}">
						<img src="{{ asset($item->featured) }}" alt="{{ $item->title }}">
					</a>
				</div>
				
				{{-- Post Title --}}
				@if($item->urdu == 1)
					<header class="urdu">
						<a href="{{ route('post.single',['slug' => $item->slug]) }}" >{{ $item->title }}</a>
					</header>
				@else
					<header>
						<a href="{{ route('post.single',['slug' => $item->slug]) }}" >{{ $item->title }}</a>
					</header>
				@endif

				{{-- Visual Logs --}}
				@if($item->category->id == 3)
					<i class="fas fa-video fa-2x mt-2" title="This is a video log"></i>
				@endif

				<div class="article_info">
					{{-- Views --}}
					@if($item->views())
					<span class="article_views">
						<i class="fas fa-eye"></i>
							{{ $item->views->count() }}
					</span>
					@endif
					{{-- Date --}}
					<span class="article_date">
						<i class="fas fa-clock"></i>
						{{ $item->created_at->toFormattedDateString() }}
					</span>
					
					{{-- Tags --}}
					<span class="article_tags">
						<i class="fas fa-tags"></i>
						@foreach ($item->tags as $tag)
							<a href="{{ route('tag.single',['id' => $tag->id]) }}" class="py-2">{{ $tag->tag }}</a>
						@endforeach 
					</span>

					{{-- Comments --}}
					<i class="fas fa-comment"></i>
					<span class="article_comments disqus-comment-count" data-disqus-identifier="{{ $item->slug }}">
					</span>

				</div>

			</article>	
		
		</div>
		@endforeach
	</div>

@endif

{{-- Pakistan  --}}
@if ($pakistan->count()>0)
  	<div class="category-list mb-4 pl-4	">
    	Pakistan
  	</div>
	
	{{-- Owl Carousel --}}
	<div class="owl-carousel owl-theme">
		@foreach($pakistan as $item)
   		<div class="item">

			<article>
				
				{{-- Post Image --}}
				<div class="text-center">
					<a href="{{ route('post.single',['slug' => $item->slug]) }}">
						<img src="{{ asset($item->featured) }}" alt="{{ $item->title }}">
					</a>
				</div>
				
				{{-- Post Title --}}
				@if($item->urdu == 1)
					<header class="urdu">
						<a href="{{ route('post.single',['slug' => $item->slug]) }}" >{{ $item->title }}</a>
					</header>
				@else
					<header>
						<a href="{{ route('post.single',['slug' => $item->slug]) }}" >{{ $item->title }}</a>
					</header>
				@endif

				{{-- Visual Logs --}}
				@if($item->category->id == 3)
					<i class="fas fa-video fa-2x mt-2" title="This is a video log"></i>
				@endif

				<div class="article_info">
					{{-- Views --}}
					@if($item->views())
					<span class="article_views">
						<i class="fas fa-eye"></i>
							{{ $item->views->count() }}
					</span>
					@endif
					
					{{-- Date --}}
					<span class="article_date">
						<i class="fas fa-clock"></i>
						{{ $item->created_at->toFormattedDateString() }}
					</span>
					
					{{-- Tags --}}
					<span class="article_tags">
						<i class="fas fa-tags"></i>
						@foreach ($item->tags as $tag)
							<a href="{{ route('tag.single',['id' => $tag->id]) }}" class="py-2">{{ $tag->tag }}</a>
						@endforeach 
					</span>

					{{-- Comments --}}
				<i class="fas fa-comment"></i>
				<span class="article_comments disqus-comment-count" data-disqus-identifier="{{ $item->slug }}">
				</span>

				</div>

			</article>

		</div>
		@endforeach
	</div>
@endif

@endsection

@section('scripts')
 <!-- Owl Carouse JS -->
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script>
	$('.owl-carousel').owlCarousel({
		animateOut: 'fadeOut',
		// animateOut: 'slideOutDown',
		// animateIn: 'flipInX',
		nav:true,
		navText: ["",""],
		// navText: ["<i class='fas fa-arrow-circle-left fa-2x'></i>","<i class='fas fa-arrow-circle-right fa-2x'></i>"],
		// navText: ["<img src='{{ asset('images/leftarrow.png') }}'>","<img src='{{ asset('images/rightarrow.png') }}'>"],
		items:3,
    	loop:true,
		margin:10,
		mouseDrag:true,
    	autoplay:true,
    	autoplayTimeout:2500,
    	autoplayHoverPause:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:3
			}
		}
	})
</script>
	
@endsection
