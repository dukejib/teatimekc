<div class="container">
    <div class="card my-4 shadow border-0 bg-dark">
        <h5 class="card-header bg-secondary text-white">About Author</h5>
        <div class="card-body">
            <div class="row">

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <img src="{{ asset($post->user->profile->avatar) }}" alt="{{ $post->user->name }} picture" width="200px" height="auto" class="rounded-circle img-fluid shadow" style="border:1px solid #6c757d;">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12 profile">
                            <h4>{{ $post->user->profile->jobtitle }}</h4>
                            <h5>{{ $post->user->profile->about }}</h5>
                            <h5>
                                Follow Me :
                                <a href="{{ $post->user->profile->twitter }}" target="_blank" class="btn btn-sm btn-primary" style="margin:0">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="{{ $post->user->profile->facebook }}" target="_blank" class="btn btn-sm btn-info" style="margin:0;">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="{{ $post->user->profile->gmail }}" target="_blank" class="btn btn-sm btn-danger" style="margin:0">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </h5>
                            <h5>
                                <a href="{{ route('author.posts',['slug' => $post->user->slug]) }}">
                                    View all of my posts
                                </a>
                            </h5>
                        </div>
                    </div>
                        
                </div>

                {{-- Twitter --}}
                <div class="col-lg-6">
                    {{-- User Twitter--}}
                    <a class="twitter-timeline"
                        href="{{ asset($post->user->profile->twitter) }}" data-tweet-limit="1" data-theme="dark">Tweets by @twittername
                    </a>
                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>

            </div>
        </div>
    </div>
</div>  