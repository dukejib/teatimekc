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
            @include('includes.errors')
            <div class="row">
                <div class="col">
            
                    <div class="card shadow-sm">
                        <div class="card-header">Edit {{  $tag->tag }}</div>
                    
                        <div class="card-body">
                            
                            <form action="{{ route('tag.update',['id' => $tag->id ]) }}" method="post">
                            
                                {{ csrf_field() }}
                                {{-- update has put --}}
            
                                <div class="form-group">
                                    <label for="tag">Tag Name</label>
                                    <input type="text" name="tag" id="tag" class="form-control" required value="{{ $tag->tag }}">
                                </div>
                    
                                
                                <div class="form-group">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class="fas fa-wrench"></i>
                                        Update Tag</button>
                                </div>
                            
                            </form>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection