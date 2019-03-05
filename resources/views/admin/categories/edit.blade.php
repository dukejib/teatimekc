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
            <div class="row">
                @include('includes.errors')
                <div class="col">
                    
                    <div class="card shadow-sm">
                        <div class="card-header">Update Category : {{ $category->category }}</div>
                    
                        <div class="card-body">
                            
                            <form action="{{ route('category.update',[ 'id' => $category->id ]) }}" method="post">
                            
                                {{ csrf_field() }}
                    
                                <div class="form-group">
                                    <label for="category">Category Name</label>
                                    <input type="text" name="category" id="category" class="form-control" required value="{{ $category->category }}">
                                </div>
                    
                                
                                <div class="form-group">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class="fas fa-wrench"></i>
                                    Update Category</button>
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