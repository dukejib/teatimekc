 <!-- Pagination -->
       
 <ul class="pagination justify-content-center mb-4">
    {{-- Previous Post --}}
    @if($prev)
    <li class="page-item">
        <a class="page-link" href="{{ route('post.single',['slug' => $prev->slug ]) }}">&larr; {{ $prev->title }}</a>
    </li>
    @endif 

    {{-- Next Post --}}
    @if($next)
    <li class="page-item">
        <a class="page-link" href="{{ route('post.single',['slug' => $next->slug ]) }}">{{ $next->title }} &rarr;</a>
    </li>
    @endif
    </ul>
<!-- End Pagination -->