@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">USER PAGE</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        Welcome to {{ config('app.name') }}
        <br>
        You Are A USER!!!!
    </div>
</div>
@endsection
