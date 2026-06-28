@extends('layouts.app')
@section('title', 'Studio Ser Design | Projeto')
@section('content')
    <style>
        body {
            background-color: #ffffff !important;
        }

        .header {
            background-color: transparent !important;
            border-bottom: none !important;
        }

        .header .logo img {
            filter: brightness(0) invert(1);
        }

        .header .menu button,
        .header .menu span,
        .header .menu svg {
            color: #ffffff !important;
        }
    </style>

    <section class="text-white d-block position-relative"
        style="background: url('{{ asset($project['cover']) }}') center center / cover no-repeat; min-height: 100vh; background-attachment: fixed;">
        <!-- Escurecimento -->
        <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.6); z-index: 1;">
        </div>

        <!-- Header fixo no topo da seção -->
        <div style="position: absolute; top:0; left:0; width: 100%; z-index: 3;">
            <x-header title="Projeto" />
        </div>

        <!-- Conteúdo Centralizado na Hero -->
        <div class="d-flex align-items-center justify-content-center position-absolute top-0 start-0 w-100 h-100" style="z-index: 2;">
            <div class="text-center px-4">
                <p class="montserrat-300 m-0" style="font-size: 2.2rem; letter-spacing: 2px; line-height: 1.6; color: rgba(255, 255, 255, 0.35);">
                    <span style="color: rgba(255, 255, 255, 0.6); text-transform: uppercase; font-weight: 300;">INVESTIR</span> em <span style="color: #ffffff; font-weight: 400;">mudanças</span> que transformem vidas.
                </p>
            </div>
        </div>

    </section>

    <section class="project-intro container">
        <div class="project-category montserrat-400">
            {{ $project['category'] }}
        </div>
        
        <h1 class="project-title-large montserrat-400 reveal-left">
            {{ $project['name'] }}
        </h1>

        <div class="project-info-grid">
            <div class="project-info-block reveal-left">
                <h3 class="montserrat-700">Desafio</h3>
                <p class="montserrat-300">
                    {{ $project['desafio'] }}
                </p>
            </div>
            <div class="project-info-block reveal-right">
                <h3 class="montserrat-700">Solução</h3>
                <p class="montserrat-300">
                    {{ $project['solucao'] }}
                </p>
            </div>
        </div>
    </section>

    <section class="project-gallery container pb-5 text-center">
        @foreach (array_slice($project['images'], 1) as $img)
            <img src="{{ asset($img) }}" alt="{{ $project['name'] }} gallery image"
                class="img-fluid mb-5 w-100 reveal-zoom" style="max-width: 1200px; border-radius: 8px;">
        @endforeach
    </section>

    <section class="py-5 my-5 container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center py-4 d-flex flex-column justify-content-center align-items-center reveal-left">
                <h2 class="montserrat-700 m-0" style="font-size: 2.6rem; letter-spacing: 8px; color: #2b2c2c; text-transform: uppercase;">
                    REALIZA<span class="montserrat-300">ÇÃO</span>
                </h2>
                <p class="montserrat-300 mt-4 px-4" style="font-size: 1.15rem; line-height: 1.6; color: #2b2c2c; max-width: 440px;">
                    conseguir algo que tanto almeja,<br>que faz sentido para sua vida
                </p>
            </div>
            <div class="col-md-6 text-center reveal-right">
                <img src="{{ asset('img/projects/IMÓVEIS DA MARCELA/close-up-people-making-home-comfortable.jpg') }}" 
                    alt="Realização" class="img-fluid w-100" style="max-width: 550px; border-radius: 0;">
            </div>
        </div>
    </section>

    <nav class="project-nav montserrat-400">
        <a href="{{ $project['prev_slug'] ? url('/projeto/' . $project['prev_slug']) : '#' }}" class="hover-underline nav-prev-link">projeto anterior</a>
        <a href="{{ url('/projetos') }}" class="hover-underline nav-all-link">ver todos</a>
        <a href="{{ $project['next_slug'] ? url('/projeto/' . $project['next_slug']) : '#' }}" class="hover-underline nav-next-link">projeto seguinte</a>
    </nav>

    <x-footer />

    <script>
        window.addEventListener('scroll', () => {
            if (window.scrollY > 80) {
                document.body.classList.add('project-scrolled');
            } else {
                document.body.classList.remove('project-scrolled');
            }
        });
    </script>

@endsection

