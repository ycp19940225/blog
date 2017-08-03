@if ($urls)
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if (!$urls['pre'])
            <li class="disabled"><span>@lang('pagination.previous')</span></li>
        @else
            <li><a href="{{ $urls['pre'] }}" rel="prev">@lang('pagination.previous')</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($urls['next'])
            <li><a href="{{ $urls['next'] }}" rel="next">@lang('pagination.next')</a></li>
        @else
            <li class="disabled"><span>@lang('pagination.next')</span></li>
        @endif
    </ul>
@endif
