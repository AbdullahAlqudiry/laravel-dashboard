@if ($paginator->lastPage() > 1)
    <ul class="pagination mb-1">

        <li class="paginate_button page-item previous {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <button type="button" dusk="previousPage" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')" class="page-link">{!! __('pagination.previous') !!}</button>
        </li>

        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="paginate_button page-item disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li class="paginate_button page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}" wire:key="paginator-page-{{ $page }}">
                        <button type="button" class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                    </li>
                @endforeach
            @endif
        
        @endforeach

        <li class="paginate_button page-item next  {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
            <button type="button" dusk="nextPage" class="page-link" wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">{!! __('pagination.next') !!}</button>
        </li>
        
    </ul>
@endif