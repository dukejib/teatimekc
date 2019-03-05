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
            
                    <div class="table-responsive shadow-sm">
                        <table class="table table-hover table-bordered">
                
                
                            <thead class="thead-dark">
                                <th>
                                    Tag
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </thead>
                
                            <tbody>
                                @if (count($tags)>0)
                                    
                                    @foreach ($tags->all() as $tag)
                                        
                                        <tr>
                                            <td>
                                                {{ $tag->tag }}
                                            </td>
                                        
                                            <td>
                                                <a href="{{ route('tag.edit', ['id' => $tag->id ]) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                
                                            <td>
                                                @if(Auth::user()->isAdmin == 1)
                                                    Trash
                                                @else
                                                <a href="{{ route('tag.destroy',['id' => $tag->id]) }}" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                                @endif
                                            </td>
                                        
                                        </tr>
                                        
                
                                    @endforeach
                
                
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No Tags Defined</td>
                                    </tr>
                
                                @endif
                            </tbody>
                
                        </table>
                    </div>
                    {{-- Insert Pagination --}}
                    {{ $tags->links() }}
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                            <div class="card-header">Create New Tag</div>
                        
                            <div class="card-body">
                                
                                <form action="{{ route('tag.store') }}" method="post">
                                
                                    {{ csrf_field() }}
                        
                                    <div class="form-group">
                                        <label for="tag">Tag Name</label>
                                        <input type="text" name="tag" id="tag" class="form-control" required>
                                    </div>
                        
                                    
                                    <div class="form-group">
                                        <button class="btn btn-success btn-sm" type="submit">
                                            <i class="fas fa-save"></i>
                                            Store Tag</button>
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