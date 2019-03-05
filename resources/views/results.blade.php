@extends('layouts.frontend')

@section('contents')
    
<div class="row">

    <div class="col-lg-8 col-md-8 col-sm-12">
       

        <div class="card my-4 shadow border-0 bg-dark">
            
                {{-- Title --}}
                <div class="card-header bg-secondary">
                    <h5><i class="fas fa-search"></i>  {{$query}}</h5>
                </div>
    
                <div class="card-body" style="background-color:#c0c0c0ee">
                        @if($posts->count() > 0)
                        <div class="text-center">
                            @foreach ($posts as $post)
                            <article>
                                
                                {{-- Post Image --}}
                                <div class="text-center">
                                    <a href="{{ route('post.single',['slug' => $post->slug]) }}">
                                        <img src="{{ asset($post->featured) }}" alt="{{ $post->title }}">
                                    </a>
                                </div>
                                
                                {{-- Post Title --}}
                                @if($post->urdu == 1)
                                    <header class="urdu">
                                        <a href="{{ route('post.single',['slug' => $post->slug]) }}" >{{ $post->title }}</a>
                                    </header>
                                @else
                                    <header>
                                        <a href="{{ route('post.single',['slug' => $post->slug]) }}" >{{ $post->title }}</a>
                                    </header>
                                @endif
                                
                                
                                <div class="article_info">
                                    {{-- Views --}}
                                    @if($post->views())
                                    <span class="article_views">
                                        <i class="fas fa-eye"></i>
                                            {{ $post->views->count()}}
                                    </span>
                                    @endif
                    
                                    {{-- Date --}}
                                    <span class="article_date">
                                        <i class="fas fa-clock"></i>
                                        {{ $post->created_at->toFormattedDateString() }}
                                    </span>
                                    
                                    {{-- Tags --}}
                                    <span class="article_tags">
                                        <i class="fas fa-tags"></i>
                                        @foreach ($post->tags as $tag)
                                            <a href="{{ route('tag.single',['id' => $tag->id ]) }}" class="py-2">{{ $tag->tag }}</a>
                                        @endforeach 
                                    </span>
                    
                                    {{-- Comments --}}
                                    <i class="fas fa-comment"></i>
                                    <span class="article_comments disqus-comment-count" data-disqus-identifier="{{ $post->slug }}">
                                    </span>
                    
                                </div>
                                
                            </article>
                            @endforeach
                            {{-- <img src="{{ asset('svg/nothingfound.svg') }}" alt="" srcset=""> --}}
                
                        </div>
                        @else
                        <div class="text-center">
                            <img src="{{ asset('svg/categorydoesnotexist.svg') }}" alt="" srcset="" class="img-fluid">
                        </div>
                        @endif
                </div>
    
                <div class="card-footer text-center">
                    
                </div>
            </div>
        
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">

            @include('includes.search')
            @include('includes.categories')
            @include('includes.tags')
            @include('includes.sidewidget')

    </div>
</div>

@endsection