@extends('layouts.app')
@section('title', 'Studio Ser Design | Projetos')
@section('content')
    <style>
        /* Base e Reset para a página */
        body {
            background-color: #fcfcfc !important; /* Branco super leve para contraste elegante */
            color: #1a1a1a;
            overflow-x: hidden;
        }

        /* --- HEADER ADAPTAÇÕES --- */
        .header {
            background-color: transparent !important;
            border-bottom: none !important;
            padding: 20px 0;
            width: 100%;
        }

        .header .logo img {
            filter: brightness(0) invert(1);
        }

        .header .menu button,
        .header .menu span,
        .header .menu svg {
            color: #ffffff !important;
        }

        /* --- HERO SECTION --- */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh; 
            background: url('{{ asset('img/projects/TARIH/002-28.png') }}') center center / cover no-repeat;
            background-attachment: fixed;
            z-index: 0;
        }

        /* Gradient Overlay no lugar da div monocromática de 50% opacity */
        .hero-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 1;
            background: radial-gradient(circle at center, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.7) 100%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            padding: 0 20px;
        }

        .hero-title {
            font-size: clamp(3rem, 8vw, 6.5rem);
            font-weight: 700;
            letter-spacing: -1px;
            margin: 0;
            line-height: 1.1;
            text-transform: uppercase;
        }

        .hero-subtitle {
            font-size: clamp(1rem, 2vw, 1.25rem);
            font-weight: 300;
            letter-spacing: 4px;
            margin-top: 15px;
            text-transform: uppercase;
            opacity: 0.9;
        }

        /* --- PORTFOLIO GRID --- */
        .portfolio-wrapper {
            padding: 120px 5%;
            max-width: 1600px;
            margin: 0 auto;
            background: #fcfcfc;
            position: relative;
            z-index: 2;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            column-gap: 5%;
            row-gap: 120px;
        }

        @media (max-width: 991px) {
            .portfolio-grid {
                grid-template-columns: 1fr;
                row-gap: 80px;
            }
        }

        /* Alternating 1 and 2 items layout for desktop */
        @media (min-width: 992px) {
            .portfolio-grid .project-item:nth-child(3n+1) {
                grid-column: span 2;
            }
            .portfolio-grid .project-item:nth-child(3n+1) .project-image-container {
                aspect-ratio: 16/9; /* Aspect ratio horizontal para o item que ocupa a linha inteira */
            }
        }

        /* --- PROJECT CARD --- */
        .project-item {
            text-decoration: none;
            display: block;
            color: inherit;
        }
        
        .project-item:hover {
            text-decoration: none;
            color: inherit;
        }

        .project-image-container {
            position: relative;
            width: 100%;
            overflow: hidden;
            aspect-ratio: 4/5; /* Aspect ratio elegante */
            background-color: #eee;
        }

        .project-img-base,
        .project-img-hover {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
            transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1), 
                        opacity 0.6s ease;
            will-change: transform, opacity;
        }

        .project-img-hover {
            opacity: 0;
            z-index: 2;
        }

        /* Hover Interactions */
        .project-item:hover .project-img-base {
            transform: scale(1.04);
        }

        .project-item:hover .project-img-hover {
            opacity: 1;
            transform: scale(1.04);
        }

        .project-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Escurecimento */
            z-index: 3;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        .view-project-btn {
            background-color: #ffffff;
            color: #1a1a1a;
            padding: 14px 28px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            transform: translateY(20px); /* Começa levemente para baixo */
            transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .project-item:hover .project-overlay {
            opacity: 1;
        }

        .project-item:hover .view-project-btn {
            transform: translateY(0); /* Sobe ao centro */
        }

        .project-meta {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 6px;
        }

        .project-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.4rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin: 0;
            /* Animação do underline */
            position: relative;
            display: inline-block;
        }

        .project-title::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -2px;
            left: 0;
            background-color: #1a1a1a;
            transition: width 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .project-item:hover .project-title::after {
            width: 100%;
        }

        .project-category {
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            color: #666;
            font-weight: 400;
            letter-spacing: 0;
            text-align: left;
            max-width: 100%;
        }

        /* Utils para animações removidos para garantir visibilidade */
    </style>

    <div style="position: absolute; top:0; left:0; width: 100%; z-index: 50;">
        <x-header title="Projetos" />
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Projetos</h1>
            <div class="hero-subtitle montserrat-300">
                Estratégia, Branding e Design
            </div>
        </div>
    </section>

    <!-- Portfolio Grid -->
    <section class="portfolio-wrapper">
        <div class="portfolio-grid">
            @foreach ($projects as $proj)
                <a href="{{ url('/projeto/' . $proj['slug']) }}" class="project-item">
                    <div class="project-image-container">
                        <img src="{{ asset($proj['cover']) }}" class="project-img-base" alt="{{ $proj['name'] }}">
                        <img src="{{ asset($proj['hover']) }}" class="project-img-hover" alt="{{ $proj['name'] }}">
                        <div class="project-overlay">
                            <span class="view-project-btn">Ver Projeto</span>
                        </div>
                    </div>
                    <div class="project-meta">
                        <h2 class="project-title">{{ $proj['name'] }}</h2>
                        <div class="project-category">{{ $proj['category'] }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <x-footer />

    <script>
        // Scripts removidos
    </script>
@endsection

