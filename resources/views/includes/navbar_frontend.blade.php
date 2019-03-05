<nav class="navbar navbar-expand-lg navbar-dark navbar-frontend shadow fixed-top">
  
  {{-- Put In Container to apply boostrap default margin & paddings --}}
  <div class="container">

    {{-- Brand Name --}}
    <a href="{{ route('index') }}" class="navbar-brand">
      <i class="fas fa-coffee" style="color:white"></i>
      {{-- <img src="{{ asset('/svg/teatime.svg') }}" width="30" height="30" alt=""> --}}
      {{ config('app.name') }}</a>

    {{-- Toggle --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    {{-- Toggle End --}}

    {{-- Add item in #navbarSupportedContent Div --}}
    <div id="navbarSupportedContent" class="collapse navbar-collapse">

      {{-- Menu Buttons --}}
        <ul class="navbar-nav ml-auto">
          
          {{-- @foreach ($categories as $category) --}}
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('category.single',['slug' => $categories[0]->slug]) }}">
              <i class="fas fa-dice-one"></i>
			  {{ $categories[0]->category }}
			  @if($categories[0]->posts->count())
			  <span class="badge badge-dark">{{ $categories[0]->posts->count() }}</span>
              @endif
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('category.single',['slug' => $categories[1]->slug]) }}">
              <i class="fas fa-dice-two"></i>
			  {{ $categories[1]->category }}
			  @if($categories[1]->posts->count()>0)
              <span class="badge badge-dark">{{ $categories[1]->posts->count() }}</span>
              @endif
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('category.single',['slug' => $categories[2]->slug]) }}">
              <i class="fas fa-dice-three"></i>
			  {{ $categories[2]->category }}
			  @if($categories[2]->posts->count()>0)
              <span class="badge badge-dark">{{ $categories[2]->posts->count() }}</span>
              @endif
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('category.single',['slug' => $categories[3]->slug]) }}">
              <i class="fas fa-dice-four"></i>
              {{ $categories[3]->category }}
              @if($categories[3]->posts->count()>0)
              <span class="badge badge-dark">{{ $categories[3]->posts->count() }}</span>
              @endif
            </a>
          </li>

		  @if(!Auth::check())
		  <li class="nav-item">
			<a class="nav-link" href="{{ route('login') }}">
				<i class="fas fa-sign-in-alt"></i>
				Login
			</a>
		</li>
		@endif

		@if (Auth::check())
		<li class="nav-item">
		<a class="nav-link" href="{{ route('dashboard') }}">
			<i class="fas fa-cog"></i>
			Go To Dashboard
		</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href="{{ route('logout') }}"
				onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
				<i class="fas fa-sign-out-alt fa-fw"></i>
				{{ __('Logout') }}
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</li>

		@endif

          {{-- @endforeach --}}

        </ul>

      {{-- Menu Buttons End --}}


      
    
    </div>
    {{-- navbarSupportedContent End --}}

  </div>
  {{-- Container End --}}
</nav>
