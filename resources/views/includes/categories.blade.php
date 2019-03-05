<div class="card my-4 shadow border-0 bg-dark">
    <h5 class="card-header bg-secondary">Categories</h5>
    <div class="card-body">
        <div class="row">
            
            @if(count($categories)>0)
            {{-- Cut The Chunk in Half --}}
            <?php $h = ceil($categories->count() / 2) ?>
            
                @foreach ($categories->chunk($h) as $items)
                <div class="col-lg-6">
                    
                    <ul class="list-unstyled mb-0">
                        @foreach($items as $category)
                        <li>
                            <a href="{{ route('category.single',['slug' => $category->slug]) }}">{{ $category->category }}</a>
                            @if($category->posts->count())
                                <span class="badge badge-info">{{ $category->posts->count() }}</span>
                            @else
                                <span class="badge badge-info">0</span>
                            @endif
                        </li>
                        @endforeach
                    </ul>

                </div>
                @endforeach
            @else
                <h3>No Categories Defined</h3>    
            @endif
        </div>
    </div>
</div>