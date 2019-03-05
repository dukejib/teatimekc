<div class="container">
			
    <div class="badges">
        <h3 class="text-white">Post Tags</h3>
        <br>   

        @foreach ($post->tags->all() as $tag)
            <a href="{{ route('tag.single',['id' => $tag->id]) }}" class="badge badge-primary">
                {{ $tag->tag }}
                {{-- @if($tag->posts->count()>0)
                    <span class="badge badge-dark">{{ $tag->posts->count() }}</span>
                @endif --}}
            </a>
            {{-- <span class="badge badge-pill badge-info my-2 py-2">{{ $tag->tag }}</span> --}}
        @endforeach 
    </div>
</div>