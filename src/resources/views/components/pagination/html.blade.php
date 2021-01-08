@if ($paginator->lastPage() > 1)
    <ul class="pagination mb-1">

        <li class="paginate_button page-item previous {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <a href="{{ $paginator->previousPageUrl() }}" class="page-link">{!! __('pagination.previous') !!}</a>
        </li>

        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="paginate_button page-item disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="paginate_button page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                    </li>
                @endforeach
            @endif
        
        @endforeach

        <li class="paginate_button page-item next  {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-link">{!! __('pagination.next') !!}</a>
        </li>
        
    </ul>
@endif