@if ($paginator->hasPages())
    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
        <div class="dataTables_paginate paging_simple_numbers" id="kt_customers_table_paginate">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="paginate_button page-item previous disabled" id="kt_customers_table_previous">
                        <a href="#" aria-controls="kt_customers_table" data-dt-idx="0" tabindex="-1"
                            class="page-link">
                            <i class="previous"></i>
                        </a>
                    </li>
                @else
                    <li class="paginate_button page-item previous" id="kt_customers_table_previous">
                        <a href="{{ $paginator->previousPageUrl() }}" aria-controls="kt_customers_table" data-dt-idx="0"
                            tabindex="0" class="page-link">
                            <i class="previous"></i>
                        </a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="paginate_button page-item disabled">
                            <span class="page-link">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="paginate_button page-item active">
                                    <a href="#" aria-controls="kt_customers_table"
                                        data-dt-idx="{{ $page }}" tabindex="0"
                                        class="page-link">{{ $page }}</a>
                                </li>
                            @else
                                <li class="paginate_button page-item">
                                    <a href="{{ $url }}" aria-controls="kt_customers_table"
                                        data-dt-idx="{{ $page }}" tabindex="0"
                                        class="page-link">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="paginate_button page-item next" id="kt_customers_table_next">
                        <a href="{{ $paginator->nextPageUrl() }}" aria-controls="kt_customers_table" data-dt-idx="5"
                            tabindex="0" class="page-link">
                            <i class="next"></i>
                        </a>
                    </li>
                @else
                    <li class="paginate_button page-item next disabled" id="kt_customers_table_next">
                        <a href="#" aria-controls="kt_customers_table" data-dt-idx="5" tabindex="-1"
                            class="page-link">
                            <i class="next"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endif
