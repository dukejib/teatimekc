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
        
                    <div class="table-responsive shadow">
                        <table class="table table-hover table-bordered">
                            <thead class="thead-dark">
                                <th>
                                    Category
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </thead>
                            
                            @if (count($categories)>0)
                            <tbody>
                                @foreach ($categories->all() as $category)
                                    
                                    <tr>
                                        <td>
                                            {{ $category->category }}
                                        </td>
                                    
                                        <td>
                                            <a href="{{ route('category.edit', ['id' => $category->id ]) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>

                                        <td>
                                            @if(Auth::user()->isAdmin == 1)
                                                Trash
                                            @else
                                            <a href="{{ route('category.delete',['id' => $category->id]) }}" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            @endif
                                        </td>
                                    
                                    </tr>
                                    

                                @endforeach
                            </tbody>
                            @else
                                <h5 class="text-danger">No Categories Defined</h5>
                            @endif
                        </table>
                    </div>
                    {{-- Add Pagination --}}
                    {{ $categories->links() }}
                </div>
        
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-header">Create New Category</div>
                    
                        <div class="card-body">
                            
                            <form action="{{ route('category.store') }}" method="post">
                            
                                {{ csrf_field() }}
                    
                                <div class="form-group">
                                    <label for="category">Category Name</label>
                                    <input type="text" name="category" id="category" class="form-control" required>
                                </div>
                    
                                
                                <div class="form-group">
                                    <button class="btn btn-success btn-sm" type="submit">
                                        <i class="fas fa-save"></i>
                                        Store Category</button>
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