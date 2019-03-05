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
     
        @include('includes.errors')

        <div class="card shadow-sm">


            <div class="card-header">Create New Post</div>

            <div class="card-body">
                
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" name="title" id="title" class="form-control" required value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="shortnote">Short Note about post</label>
                        <input type="text" name="shortnote" id="shortnote" class="form-control" required value="{{ old('shortnote') }}">
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="urdu" class="bg-dark text-white p-2">Is Post in Urdu?</label>
                                <br>
                                <input type="checkbox" name="urdu" id="urdu" value="{{ old('urdu') }}">
                            </div>

                            <div class="form-group">
                                <label for="featured">Post Image (800px wide - 450px height) : 1024kb in size</label>
                                <input type="file" name="featured" id="featured" class="form-control-file" required>
                            </div>    
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="category">Select Category</label>
                                <br>
                                <select name="category_id" id="category_id" class="custom-select">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? "selected":""}}>{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        
                        <div class="col">
                            <div class="form-group">
                                <label for="tags">Select Post Tag(s)</label>
                                <br>
                                @foreach ($tags as $tag)
                                <div class="form-checkbox form-check-inline">
                                    <input type="checkbox"  name="tags[]" id="tags[]" value="{{ $tag->id }}">
                                    <label class="form-check-label">{{ $tag->tag }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    

                    

                    <div class="form-group">
                        <label for="content">Post Content</label>
                        <textarea class="form-control" cols="10" rows="5" name="content" id="content" required >
                            {!! old('content') !!}
                        </textarea>
                    </div>
                    
                    <div class="form-group">
                        <button class="btn btn-success btn-sm btn-block" type="submit">
                            <i class="fas fa-save"></i>
                            Save Post</button>
                    </div>
                
                </form>

            </div>
        </div>
        
    </div>


</div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
    <script>

            //Get Emojis from Github
        // $.ajax({
        //     url: 'https://api.github.com/emojis',
        //     async: false 
        //     }).then(function(data) {
        //         window.emojis = Object.keys(data);
        //         window.emojiUrls = data; 
        // });;

        // Add Emojis
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



      $(document).ready(function() {
            $('#content').summernote({
                height: 200,
                minHeight:null,
                maxHeight:null,
                fontNames : ['Jameel Noori','Arial','Asu Naskh','Courier New'],
                fontNamesIgnoreCheck:['Jameel Noori'],
                placeholder: 'write your post here...'
                // toolbar: [
                //     ['misc', ['emoji']],
                //     ['code', ['codeview']]
	            // ]
            });
        });

        

    </script>
@endsection