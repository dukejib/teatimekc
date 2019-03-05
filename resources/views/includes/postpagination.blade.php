 <!-- Pagination -->
<div class="border-0">      
    <ul class="pagination justify-content-center mt-5 mb-5">
        {{-- Previous Post --}}
        @if($prev)
        
            @if($prev->urdu == 1)
                <li class="page-item urdu-page-item-link">
            @else        
                <li class="page-item">
            @endif
                    <a class="page-link" href="{{ route('post.single',['slug' => $prev->slug ]) }}">
                        <i class="fas fa-arrow-circle-left fa-fw text-white"></i>{{ $prev->title }}
                    </a>
                </li>
            
        @endif 

        {{-- Next Post --}}
        @if($next)
        
    
            @if($next->urdu == 1)
                <li class="page-item urdu-page-item-link">
            @else
                <li class="page-item">
            @endif
                    <a class="page-link" href="{{ route('post.single',['slug' => $next->slug ]) }}">
                        {{ $next->title }}<i class="fas fa-arrow-circle-right fa-fw text-white" ></i>
                    </a>
                </li>
        @endif
    </ul>
</div>
<!-- End Pagination -->