@extends('layouts.app')

@section('content')

<div class="container mt-2 justify-content-center">

    <div class="row">
        <!-- Include Menu -->
        <div class="col-lg-3">
            @include('includes.adminmenu')
        </div>

        <!-- Add Content here -->
        <div class="col-lg-9">

            <div class="card shadow-sm">

                <div class="card">
                
                    @if($post->urdu == 1)
                        <div class="card-header urdu">Edit Post &rarr; {{ $post->title }}</div>
                    @else
                        <div class="card-header">Edit Post &rarr; {{ $post->title }}</div>
                    @endif
                        <div class="card-body">
                
                            <div class="form-group">
                                <label for="title">Post Title</label><br>
                                @if($post->urdu == 1)
                                <span class="urdu" style="font-size:150%;">{{ $post->title }}</span>
                                @else
                                {{ $post->title }}
                                @endif
                            </div>
                
                            <div class="form-group">
                                <label for="shortnote">Short Note about post</label><br>
                                @if($post->urdu == 1)
                                <span class="urdu" style="font-size:150%;">{{ $post->shortnote }}</span>
                                @else
                                {{ $post->shortnote }}
                                @endif
                            </div>


                            <div class="row">

                                <div class="col">
                                   
                                    <div class="form-group">
                                        <img src="{{ $post->featured }}" alt="{{ $post->title }}" class="img-fluid img-thumbnail">
                                    </div>
                                </div>
                                
                            </div>
                
                            <div class="form-group">
                                {!! $post->content !!}
                            </div>
                       
                    
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
