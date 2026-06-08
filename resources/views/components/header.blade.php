@props(['title' => '(MENU)'])

<header class="header">
    <nav class="d-flex justify-content-between align-items-center container-fluid p-5">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Studio Ser Design">
            </a>
        </div>
        <div class="menu montserrat-400 text-uppercase">
            <button class="btn btn-link border-0 p-0 text-decoration-none d-flex align-items-center gap-2" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#mainMenuOffcanvas" aria-controls="mainMenuOffcanvas"
                style="color: inherit;">
                <span class="d-none d-md-inline" style="margin-top:2px;">{{ $title }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor"
                    class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
        </div>
    </nav>
    {{ $slot ?? '' }}
</header>

<!-- Offcanvas Menu -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="mainMenuOffcanvas" aria-labelledby="mainMenuOffcanvasLabel"
    style="background-color: #efe0cb; color: #2b2c2c;">
    <div class="offcanvas-header p-5 pb-0">
        <h5 class="offcanvas-title montserrat-400" id="mainMenuOffcanvasLabel">MENU</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-5">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 fs-3 montserrat-300">
            <li class="nav-item mb-4 mt-4">
                <a class="nav-link text-uppercase hover-underline" href="{{ url('/') }}">Início</a>
            </li>
            <li class="nav-item mb-4">
                <a class="nav-link text-uppercase hover-underline" href="{{ url('/projetos') }}">Projetos</a>
            </li>
            <li class="nav-item mb-4">
                <a class="nav-link text-uppercase hover-underline" href="#">Sobre</a>
            </li>
            <li class="nav-item mb-4">
                <a class="nav-link text-uppercase hover-underline" href="{{ url('/contato') }}">Contato</a>
            </li>
        </ul>
    </div>
</div>
