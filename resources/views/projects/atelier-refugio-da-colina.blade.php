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

        /* Brand Concept Section Styles */
        .brand-concept {
            background-color: #D6C2AF;
            padding: 120px 0;
            color: #1a1a1a;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .brand-concept-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            align-items: center;
            gap: 40px;
            margin-bottom: 80px;
        }

        .brand-concept-row:last-child {
            margin-bottom: 0;
        }

        .brand-icon-box {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .brand-icon-box img {
            max-width: 180px;
            height: auto;
            /* Se as imagens forem coloridas, podemos forçar um visual de linha se necessário */
            /* filter: grayscale(1) contrast(1.2); */
        }

        .brand-text-label {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 500;
        }

        .brand-text-sublabel {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.85rem;
            font-weight: 300;
            margin-top: 5px;
            opacity: 0.8;
        }

        .brand-sample-manuscript {
            font-family: 'Dancing Script', cursive;
            font-size: 2.5rem;
            text-align: center;
        }

        .brand-sample-serif {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            font-weight: 500;
            letter-spacing: 3px;
            text-transform: uppercase;
            text-align: center;
        }

        .brand-color-swatches {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .color-swatch {
            width: 60px;
            height: 60px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        @media (max-width: 991px) {
            .brand-concept-row {
                grid-template-columns: 1fr 1fr;
                gap: 40px;
            }
            .brand-sample-manuscript, .brand-sample-serif {
                text-align: left;
            }
        }

        @media (max-width: 576px) {
            .brand-concept-row {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .brand-icon-box, .brand-color-swatches, .brand-sample-manuscript, .brand-sample-serif {
                justify-content: center;
                text-align: center;
            }
        }
    </style>

    <section class="text-white d-block position-relative"
        style="background: url('{{ asset('img/projects/ATELIER REFÚGIO DA COLINA/Free Business Card Among Cactus Mockup.png') }}') center center / cover no-repeat; min-height: 100vh; background-attachment: fixed">
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

    <section class="brand-concept reveal">
        <div class="container">
            <div class="brand-concept-row">
                <div class="brand-icon-box">
                    <!-- Usando a imagem 017-10 como placeholder para a casa -->
                    <img src="{{ asset('img/projects/ATELIER REFÚGIO DA COLINA/017-10.png') }}" alt="Simbolo Madeira" style="filter: grayscale(1) brightness(0.2) contrast(1.5); opacity: 0.8;">
                </div>
                <div class="brand-info-box">
                    <div class="brand-text-label">Madeira</div>
                    <div class="brand-text-sublabel">(conforto e aconchego)</div>
                </div>
                <div class="brand-sample-box">
                    <div class="brand-sample-manuscript">Atelier Refúgio da Colina</div>
                </div>
                <div class="brand-info-box">
                    <div class="brand-text-label">Fonte Manuscrita</div>
                    <div class="brand-text-sublabel">(representa o trabalho manual)</div>
                </div>
            </div>

            <div class="brand-concept-row">
                <div class="brand-icon-box">
                    <!-- Mesmo placeholder com foco diferente se fosse possível, ou apenas mantendo a estrutura -->
                    <img src="{{ asset('img/projects/ATELIER REFÚGIO DA COLINA/017-10.png') }}" alt="Simbolo Cortina" style="filter: grayscale(1) brightness(0.2) contrast(1.5); opacity: 0.8;">
                </div>
                <div class="brand-info-box">
                    <div class="brand-text-label">Cortina | Plantas</div>
                    <div class="brand-text-sublabel">(acolhimento)</div>
                </div>
                <div class="brand-sample-box">
                    <div class="brand-sample-serif">CERÂMICA & CAFÉ</div>
                </div>
                <div class="brand-info-box">
                    <div class="brand-text-label">Fonte com Serifa</div>
                    <div class="brand-text-sublabel">(transmite respeito e comprometimento)</div>
                </div>
            </div>

            <div class="brand-concept-row">
                <div class="brand-icon-box">
                    <!-- Placeholder genérico para montanhas ou imagem similar -->
                    <svg viewBox="0 0 200 100" style="width: 180px; fill: none; stroke: #1a1a1a; stroke-width: 1.5;">
                        <path d="M10 90 Q 60 10 110 90 T 210 90" />
                    </svg>
                </div>
                <div class="brand-info-box">
                    <div class="brand-text-label">Vales | Colina</div>
                    <div class="brand-text-sublabel">(simboliza o Vale dos Vinhedos - RS)</div>
                </div>
                <div class="brand-color-swatches">
                    <div class="color-swatch" style="background-color: #1a1a1a;"></div>
                    <div class="color-swatch" style="background-color: #C7AF89; border: 1px solid rgba(0,0,0,0.1);"></div>
                </div>
                <div class="brand-info-box">
                    <div class="brand-text-label">Cores que representam a argila</div>
                </div>
            </div>
        </div>
    </section>

    <section class="project-gallery container pb-5 text-center">
        @foreach ($project['images'] as $img)
            <img src="{{ asset($img) }}" alt="{{ $project['name'] }} gallery image"
                class="img-fluid mb-5 w-100 reveal-zoom" style="max-width: 1200px; border-radius: 8px;">
        @endforeach
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

