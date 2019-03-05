<div class="card my-4 shadow border-0 bg-dark">
    <h5 class="card-header bg-secondary">Tags</h5>
    <div class="card-body">
        <div class="row">

            @if(count($tags)>0)
            {{-- Cut The Chunk in Half --}}
                @foreach ($tags as $tag)

                    <div class="col-lg-6">
                            {{-- <ul class="list-unstyled mb-0"> --}}
                                    {{-- @foreach($tags as $tag) --}}
                                    {{-- <li> --}}
                                        <a href="{{ route('tag.single',['slug' => $tag->id]) }}">{{ $tag->tag }}</a>
                                        @if($tag->posts->count())
                                            <span class="badge badge-info">{{ $tag->posts->count() }}</span>
                                        @else
                                            <span class="badge badge-info">0</span>
                                        @endif
                                    {{-- </li> --}}
                                    {{-- @endforeach --}}
                                {{-- </ul> --}}
                    </div>

                {{-- <div class="col-lg-6"> --}}
                    {{-- <ul class="list-unstyled mb-0">
                        @foreach($t as $tag)
                        <li>
                            <a href="{{ route('tag.single',['id' => $tag->id]) }}">{{ $tag->tag }}</a>
                        </li>
                        @endforeach
                    </ul> --}}

                    {{-- <div class="tag-list-item shadow-sm" >
                        <a class="text-white" href="{{ route('tag.single',['id' => $tag->id]) }}">{{ $tag->tag }}</a> {{ $tag->posts->count() }}
                    </div> --}}
                {{-- </div> --}}
                @endforeach
            @else
                <h3>No Tags Defined</h3>    
            @endif
       
        </div>
    </div>
</div>