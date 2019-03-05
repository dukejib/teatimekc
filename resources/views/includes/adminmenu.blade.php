      
@if (Auth::check())

    <ul class="list-group shadow-sm">
        <li class="list-group-item">
            <img src="{{ asset(Auth::user()->profile->avatar) }}" class="rounded-circle shadow" style="width:80px;border:2px solid gray;">
            <h3 class="text-white mt-4">{{ Auth::user()->name }}</h3>
        </li> 
        <li class="list-group-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : null }}">
            <i class="fas fa-list fa-fw"></i>
            <a href="{{ route('dashboard') }}">
            Dashboard</a>
        </li>
        <li class="list-group-item {{ Route::currentRouteName() == 'profile' ? 'active' : null }}">
            <i class="fas fa-user fa-fw"></i>
            <a href="{{ route('profile') }}">
                My Teatime Profile
            </a>
        </li>
        <li class="list-group-item {{ Route::currentRouteName() == 'index' ? 'active' : null }}">
                <i class="fas fa-book fa-fw"></i>
                <a href="{{ route('index') }}">
                    View Teatime Blog
                </a>
            </li>


        @if(Auth::user()->isAdmin !== 2)
        {{-- User is not Admin --}}
        <li class="list-group-item {{ Route::currentRouteName() == 'tags' ? 'active' : null }}">
            <i class="fas fa-tags fa-fw"></i>
            <a href="{{ route('tags') }}">
            Tags</a>
        </li>
        <li class="list-group-item {{ Route::currentRouteName() == 'categories' ? 'active' : null }}">
            <i class="fas fa-chalkboard"></i>
            <a href="{{ route('categories') }}">
            Categories</a>
        </li>
        @endif 
        
        <li class="list-group-item {{ Route::currentRouteName() == 'posts' ? 'active' : null }}">
            <i class="fas fa-file fa-fw"></i>
            <a href="{{ route('posts') }}">
            View Posts</a>
        </li>
        <li class="list-group-item {{ Route::currentRouteName() == 'post.create' ? 'active' : null }}">
            <i class="fas fa-file fa-fw"></i>
            <a href="{{ route('post.create') }}">
            Create New Post</a>
        </li>
        <li class="list-group-item {{ Route::currentRouteName() == 'post.trashed' ? 'active' : null }}">
            <i class="fas fa-trash-alt fa-fw "></i>
            <a href="{{ route('post.trashed') }}">
            Trashed Posts</a>
        </li>
        @if(Auth::user()->isAdmin !== 2)
            <li class="list-group-item {{ Route::currentRouteName() == 'users' ? 'active' : null }}">
                <i class="fas fa-users fa-fw"></i>
                <a href="{{ route('users') }}">
                All Users</a>
            </li>
            <li class="list-group-item {{ Route::currentRouteName() == 'logs' ? 'active' : null }}">
                <i class="fas fa-file-alt fa-fw"></i>
                <a href="{{ route('logs') }}">
                Logs</a>
            </li>
        @endif

        <li class="list-group-item {{ Route::currentRouteName() == 'logout' ? 'active' : null }}">
            <i class="fas fa-sign-out-alt fa-fw"></i>
            
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>


        </li>


    </ul>

@endif
