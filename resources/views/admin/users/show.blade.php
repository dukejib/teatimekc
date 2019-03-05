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

            {{-- Profile Card --}}
            <div class="card shadow">
                <div class="card-header">{{ $user->name }}'s Profile | Total Posts ({{ $posts->total() }})</div>
            
                <div class="card-body">
                    
                    {{-- Profile Data --}}
                    <div class="form-row">

                        <div class="col-lg-6 col-sm-12 col-md-12 text-center">
                            <img src="{{ asset($profile->avatar) }}" alt="" width="200px" height="auto" class="rounded-circle img-thumbnail shadow-sm">
                            
                        </div>
                            
                        <div class="col-lg-6 col-sm-12 col-md-12">
                            
                            <div class="input-group mt-2 mb-2">
                                <div class="input-group-text rounded-0">
                                    Job Title 
                                </div>
                                <input disabled value="{{ $profile->jobtitle }}" class="form-control" required>
                            </div>
                            
                            <div class="input-group mt-2 mb-2">
                                <div class="input-group-text rounded-0">About</div>
                                <input disabled class="form-control" value="{{ $profile->about }}" required>
                            </div>
        
                            <div class="input-group mt-2 mb-2">
                                <div class="input-group-text rounded-0">
                                    <i class="fab fa-facebook"></i>  
                                </div>
                                <input disabled value="{{ $profile->facebook }}" class="form-control" required>
                            </div>
        
                            <div class="input-group mt-2 mb-2">
                                <div class="input-group-text rounded-0">
                                        <i class="fab fa-google"></i>
                                </div>
                                <input disabled value="{{ $profile->gmail }}" class="form-control" required>
                            </div>
        
                            <div class="input-group mt-2 mb-2">
                                <div class="input-group-text rounded-0">
                                    <i class="fab fa-twitter"></i>
                                </div>
                                <input disabled value="{{ $profile->twitter }}" class="form-control" required>
                            </div>
        
                            
                        </div>
                    </div>
    
    
                </div>
            </div>

            {{-- Table --}}
            <div class="table-responsive shadow-sm">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <th>
                            Image
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Created On
                        </th>
                        <th>
                            View
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Edit
                        </th>
                        <th>
                            Trash
                        </th>
                    </thead>
                    <tbody>
                        @if (count($posts)>0)
                            @foreach ($posts->all() as $post)
                                <tr>
                                    <td style="max-width: 120px">
                                        <img src="{{ $post->featured }}" alt="{{ $post->title }}" class="img img-fluid" width="90px">
                                    </td>
                                    @if($post->urdu == 1)
                                        <td class="text-truncate urdu" style="max-width: 120px">
                                            {{ $post->title }}
                                        </td>
                                    @else
                                        <td class="text-truncate" style="max-width: 120px">
                                            {{ $post->title }}
                                        </td>
                                    @endif
                                    <td>
                                        {{ $post->created_at->diffForHumans() }}
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('post.show',['id' => $post->id]) }}" class="btn btn-success btn-sm">
                                        <i class="fa fa-binoculars"></i>
                                        </a>
                                    </td>

                                    @if(Auth::user()->isAdmin  !== 2)
                                        <td>
                                            @if($post->published == 0)
                                                <a href="{{ route('post.publish', ['id' => $post->id ]) }}" class="btn btn-success btn-sm">Publish</a>
                                            @else
                                                Published
                                            @endif
                                        </td>
                                    @endif
                                    
                                    <td>
                                        <a href="{{ route('post.edit', ['id' => $post->id ]) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
        
                                    <td>
                                        <a href="{{ route('post.trash',['id' => $post->id]) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                        </a>

                                    </td>
                                </tr>
                                
                            @endforeach
                        @endif
                    </tbody>
                    
                </table>
            </div>
            {{-- Pagination --}}
  @if($posts->count()>0)
  {{ $posts->links() }}
@endif
        </div>

            
           
          

    </div>


</div>

  


@endsection