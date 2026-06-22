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

        /* Tarih Gallery Grid */
        .tarih-gallery-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .tarih-gallery-grid .gallery-item {
            width: 100%;
            aspect-ratio: 4/5;
            object-fit: cover;
            margin-bottom: 0 !important;
        }

        /* Pattern: 1, 2, 1, 2... 1st child spans 2 columns, then 4th child, 7th child, etc. */
        .tarih-gallery-grid .gallery-item:nth-child(3n + 1) {
            grid-column: span 2;
            aspect-ratio: auto;
        }

        @media (max-width: 768px) {
            .tarih-gallery-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .tarih-gallery-grid .gallery-item {
                aspect-ratio: auto;
            }
            .tarih-gallery-grid .gallery-item:nth-child(3n + 1) {
                grid-column: span 1;
            }
        }
    </style>

    <section class="text-white d-block position-relative"
        style="background: url('{{ asset('img/projects/TARIH/002-28.png') }}') center center / cover no-repeat; min-height: 100vh; background-attachment: fixed">
        <!-- Header fixo no topo da seção -->
        <div style="position: absolute; top:0; left:0; width: 100%; z-index: 3;">
            <x-header title="Projeto" />
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
        <div class="tarih-gallery-grid">
            @foreach (array_slice($project['images'], 1) as $img)
                <img src="{{ asset($img) }}" alt="{{ $project['name'] }} gallery image"
                    class="gallery-item img-fluid reveal-zoom" style="border-radius: 8px;">
            @endforeach
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

