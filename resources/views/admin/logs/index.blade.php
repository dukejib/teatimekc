@extends('layouts.app')

@section('content')

<div class="container mt-2 justify-content-center">

    <div class="row">
        <!-- Include Menu -->
        <div class="col-lg-3">
            @include('includes.adminmenu')
        </div>
        <!-- Add Content here -->
        @if($logs)
        <div class="col-lg-9">
            <div class="table-responsive shadow-sm">
                <table class="table table-hover table-bordered table-responsive">
                    <thead class="thead-dark">
                        <th>
                            No
                        </th>
                        <th>
                            Subject
                        </th>
                        <th>
                            URL
                        </th>
                        <th>
                            Method
                        </th>
                        <th>
                            IP Address
                        </th>
                        <th width="300px">
                            User Agent
                        </th>
                        <th>
                            User Id
                        </th>
                        <th>
                            Action
                        </th>
                    </thead>
            
                    <tbody>
                        @if (count($logs)>0)
                        
                            @foreach ($logs as $log)                    
                                <tr>
                                    <td>
                                        {{ $log->id }}                
                                    </td>
                                    
                                    <td>
                                        {{ $log->subject }}
                                    </td>
            
                                    <td>
                                        <span class="text-warning">{{ $log->url }}</span>
                                    </td>
            
                                    <td>
                                        <span class="badge bg-primary">{{ $log->method }}</span>
                                    </td>
            
                                    <td>
                                        {{ $log->ip }}
                                    </td>
                                        
                                    <td>
                                        <span class="text-info">{{ $log->agent }}</span>
                                    </td>
            
                                    <td>
                                        {{-- @if($log->user) --}}
                                            {{ $log->user->name }}
                                        {{-- @endif --}}
                                    </td>
                                    <td>
                                        <a href="{{ route('log.delete',['id' => $log->id]) }}" class="btn btn-danger btn-sm">
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
            @if($logs->count()>0)
                {{ $logs->links() }}
            @endif

        </div>
        @endif

    </div>

</div>
    



@endsection