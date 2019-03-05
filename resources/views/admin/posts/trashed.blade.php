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
                            Restore
                        </th>
                        <th>
                            Destroy
                        </th>
                    </thead>

                    @if (count($posts)>0)
                    <tbody>
                        @foreach ($posts->all() as $post)
                            <tr>
                                <td style="max-width: 100px">
                                    <img src="{{ $post->featured }}" alt="{{ $post->title }}" class="img img-fluid" width="90px">
                                </td>

                                <td class="text-truncate" style="max-width: 120px">
                                    {{ $post->title }}
                                </td>
                            
                                <td>
                                    <a href="{{ route('post.restore', ['id' => $post->id ]) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-window-restore"></i>
                                        Restore</a>
                                </td>

                                <td>
                                    <a href="{{ route('post.destroy',['id' => $post->id]) }}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-eraser"></i>
                                        Destroy</a>
                                </td>
                            
                            </tr>
                        @endforeach
                    </tbody>
                    @else
                        <h3 class="text-danger">No Trashed Posts yet!</h3>
                    @endif
                </table>
                
            </div>
            @if($posts->count()>0)
            {{ $posts->links() }}
            @endif
            
        </div>

    </div>

</div>
@endsection