@extends('layouts.app')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
@endsection

@section('content')

<div class="container mt-2 justify-content-center">

    <div class="row">
        <!-- Include Menu -->
        <div class="col-lg-3">
            @include('includes.adminmenu')
        </div>

        <!-- Add Content here -->
        <div class="col-lg-9">
            {{-- Show errors --}}
            @include('includes.errors')
            <div class="card shadow-sm">

                <div class="card">
                
                    @if($post->urdu == 1)
                        <div class="card-header urdu">Edit Post &rarr; {{ $post->title }}</div>
                    @else
                        <div class="card-header">Edit Post &rarr; {{ $post->title }}</div>
                    @endif
                        <div class="card-body">
                        
                        <form action="{{ route('post.update',['id' => $post->id ]) }}" method="post" enctype="multipart/form-data">
                        
                            {{ csrf_field() }}
                
                            <div class="form-group">
                                <label for="title">Post Title</label>
                                <input type="text" name="title" id="title" class="form-control" required value="{{ $post->title }}">
                            </div>
                
                            <div class="form-group">
                                <label for="shortnote">Short Note about post</label>
                                <input type="text" name="shortnote" id="shortnote" class="form-control" required value="{{ $post->shortnote }}">
                            </div>

                            <div class="row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="category">Select Category</label>
                                        <select name="category_id" id="category_id" class="custom-select">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($category->id === $post->category_id)
                                                        selected
                                                    @endif
                                                    >{{ $category->category }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label for="urdu" class="bg-dark text-white p-2">Is Post in Urdu?</label>
                                        <br>
                                        @if($post->urdu == 1)
                                        <input type="checkbox" name="urdu" id="urdu" value="1" checked>
                                        @else
                                        <input type="checkbox" name="urdu" id="urdu">
                                        @endif
                                        
                                    </div>
                                </div>

                            </div>
                            <hr>

                            <div class="row">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="featured">Post Title Image (Max Width 800 x Max height 450)</label>
                                        <input type="file" name="featured" id="featured" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Existing Post Title Image</label>
                                        <img src="{{ $post->featured }}" alt="{{ $post->title }}" class="img-fluid img-thumbnail">
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="form-group">
                                        <label for="tags">Select Post Tag(s)</label>
                                        <br>
                                        @foreach ($tags as $tag)
                                        <div class="form-check-inline">
                                            <label>
                                                <input type="checkbox" name="tags[]" id="tags[]" value="{{ $tag->id }}"
                                                @foreach($post->tags as $t)
                                                    @if($t->id == $tag->id)
                                                        checked
                                                    @endif
                                                @endforeach
                                                >
                                                {{ $tag->tag }}
                                            </label>
                                                
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                
                            <div class="form-group">
                                <label for="content">Post Content</label>
                                <br>
                                <span>http://tinypic.com/</span>
                                <span class="urdu">پوسٹ کے درمیان امیج  ڈالنے کی لئے کسی اچھی ویب سائٹ پر سیو کریں جیسے</span>
                                <span class="urdu">پھر لنک کو اپنی پوسٹ میں پیسٹ کردیں</span>
                                <textarea class="form-control" cols="10" rows="5" name="content" id="content" required>{{ $post->content }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-success btn-sm btn-block" type="submit">
                                    <i class="fas fa-wrench"></i>
                                    Save Post
                                </button>
                            </div>
                        
                        </form>
                
                    
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

@section('scripts')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 200,
                minHeight:null,
                maxHeight:null,
                fontNames : ['Jameel Noori','Arial','Asu Naskh','Courier New'],
                fontNamesIgnoreCheck:['Jameel Noori'],
                fontsize:['8','10','12','14','16','18','20','22','24','28','32','36','40'],
                placeholder: 'write your post here...'
                // fontNames : ['Nafees Nastaleeq']
                // toolbar: [
                //     ['misc', ['emoji']],
                //     ['code', ['codeview']]
	            // ]
            });
        });

        //Get Emojis from Github
        // $.ajax({
        //     url: 'https://api.github.com/emojis',
        //     async: false 
        //     }).then(function(data) {
        //         window.emojis = Object.keys(data);
        //         window.emojiUrls = data; 
        // });;

        //Add Emojis
        // $("#content").summernote({
        // height: 100,
        // // toolbar:false,
        // placeholder: 'To add Emojis...Start typing  with ":" and any alphabet then select emoji from drop downlist',
        //     hint: {
        //         match: /:([\-+\w]+)$/,
        //         search: function (keyword, callback) {
        //         callback($.grep(emojis, function (item) {
        //             return item.indexOf(keyword)  === 0;
        //             }));
        //         },
        //         template: function (item) {
        //         var content = emojiUrls[item];
        //         return '<img src="' + content + '"/> :' + item + ':';
        //         },
        //         content: function (item) {
        //         var url = emojiUrls[item];
        //         if (url) {
        //             return $('<img />').attr('src', url).css('width', 20)[0];
        //         }
        //         return '';
        //         }
        //     }
        // });

    </script>
@endsection