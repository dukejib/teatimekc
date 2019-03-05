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
                @if (count($users)>0)
    
                <div class="table-responsive shadow-sm">
                    <table class="table table-hover table-bordered">
            
                        <thead class="thead-dark">
                            <th>
                                Image
                            </th>
                            <th>
                                Name
							</th>
							<th>
								Profile
							</th>
                            <th>
                                Permission
                            </th>
                            <th>
                                Delete
                            </th>
                            
                        </thead>
            
                        <tbody>
            
                            @foreach ($users as $user)
                                @if($user->isAdmin !== 1 && $user->isAdmin !== 99)
                                <tr>
                                    <td>
                                        
                                    <img src="{{ asset($user->profile->avatar) }}"  class="img img-fluid" width="40px" style="border-radius:50%;">
                                    </td>
            
                                    <td>
                                        {{ $user->name }}
                                    </td>
								
									<td>
										<a href="{{ route('profile.show',['slug' => $user->slug ]) }}" class="btn btn-info btn-sm">
											<i class="fas fa-binoculars"></i>
										</a>
									</td>
                                    <td>
                                        @switch($user->isAdmin)
                                            @case(1)
                                                Admin
                                                @break
                                            @case(2)
                                                User
                                                @break
                                            @case(99)
                                                Super Admin
                                                @break
                                        @endswitch
                                    </td>
            
                                    <td>
										
                                        <a href="{{ route('user.delete',['id' => $user->id ]) }}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        
                                    </td>
                                
                                </tr>
                                @endif
            
                            @endforeach
            
                        </tbody>
            
                    </table>
                </div>
                @endif

                {{-- Pagination --}}
            @if($users->count()>0)
            	{{ $users->links() }}
            @endif
        </div>

    </div>

</div>




@endsection