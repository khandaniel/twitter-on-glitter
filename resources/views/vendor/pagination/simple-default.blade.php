@if ($paginator->hasPages())
    {{--<ul class="pagination">--}}
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            {{--<li class="disabled"><span>@lang('pagination.previous')</span></li>--}}
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
        @else
            {{--<li class="disabled"><span>@lang('pagination.next')</span></li>--}}
        @endif
    {{--</ul>--}}
@endif
