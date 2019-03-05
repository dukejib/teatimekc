
<div class="card my-4 shadow border-0 bg-dark">
    <h5 class="card-header bg-secondary">Search Posts</h5>
    <div class="card-body">
        
    {{-- Search Form --}}
    <form class="form-inline" method="POST" action="{{ route('query.result') }}">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="search" name="query" id="query" placeholder="Search Post Title..." aria-label="Search" class="form-control" required>
            <span class="input-group-btn">
            <button class="btn btn-success" type="submit"><i class="fas fa-search text-white"></i></button>
            </span>
        </div>
    </form>
    {{-- Search Form End --}}
    </div>
</div>