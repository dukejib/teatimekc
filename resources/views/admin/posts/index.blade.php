@extends('layouts.app')

@section('content')

<div class="container mt-2 justify-content-center">

    <div class="row">
        <!-- Include Menu -->
        <div class="col-lg-3">
            @include('includes.adminmenu')
        </div>
        <!-- Add Content here -->
        <div class="col-lg-9 ">
            
            <div class="table-responsive shadow-sm">
                <table class="table table-hover table-bordered">
                    <thead class="thead-dark">
                        <th>
                            Id
                        </th>
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

                        @if(Auth::user()->isAdmin !== 2)
                            <th>
                                Status
                            </th>
                        @endif
                        <th>
                            Edit
                        </th>
                        <th>
                            Trash
                        </th>
                        @if(Auth::user()->isAdmin !== 2)
                            <th>
                                View Member
                            </th>
                        @endif
                    </thead>
                    @if (count($posts)>0)
                    <tbody>
                            @foreach ($posts->all() as $post)
                                
                                <tr>
                                    <td>
                                        <span class="text-warning">{{ $post->id}}</span>
                                    </td>
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
                                                <span class="text-success">Published</span>
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
                                    
                                    @if(Auth::user()->isAdmin !== 2)
                                    <td>
                                        <a href="{{ route('profile.show',['slug' => $post->user->slug]) }}" class="btn btn-success btn-sm">
                                            {{ $post->user->name }}
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                
        
                            @endforeach
                    </tbody>
                    @else
                        <h3 class="text-danger">No Blog Posts yet!</h3>
                        <h4 class="text-info">Please add some Posts.</h4>
                    @endif
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