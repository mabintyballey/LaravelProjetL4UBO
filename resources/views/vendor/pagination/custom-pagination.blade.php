@if ($paginator->hasPages())
    <nav aria-label="Pagination">
        <ul class="pagination">
            {{-- Lien vers la page précédente --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Précédent">Précédent</a>
            </li>

            {{-- Affichage des numéros de page 1, 2, 3 --}}
            @foreach ([1, 2, 3] as $page)
                @if ($page <= $paginator->lastPage())
                    <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach

            {{-- Lien vers la page suivante --}}
            <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Suivant">Suivant</a>
            </li>
        </ul>
    </nav>
@endif
