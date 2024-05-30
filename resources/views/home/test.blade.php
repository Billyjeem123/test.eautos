<!-- Pagination Section -->
<div class="pagination-section">
    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center flex-wrap">
                @if ($posts->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">Prev</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $posts->previousPageUrl() }}">Prev</a></li>
                @endif

                @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                    <li class="page-item {{ ($page == $posts->currentPage()) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                @if ($posts->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}">Next</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">Next</span></li>
                @endif
            </ul>
        </nav>
    </div>
</div>
