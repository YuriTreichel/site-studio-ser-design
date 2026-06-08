@extends('layouts.app')
@section('title', 'Studio Ser Design | PISOS E CIA')
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

        .pisos-hero {
            background: url("{!! asset('img/projects/PISOS & CIA/site-pisos.png') !!}") top center / cover no-repeat;
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
        }

        .bg-pisos-yellow {
            background-color: #fbd63c;
        }

        .bg-pisos-dark {
            background-color: #1c1c1c;
        }

        .text-pisos-yellow {
            color: #fbd63c;
        }

        .letter-spacing-2 {
            letter-spacing: 2px;
        }

        .line-height-lg {
            line-height: 1.8;
        }

        .color-dot {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 15px;
        }

        .pisos-img-block {
            padding: 40px;
        }
    </style>

    <div style="position: absolute; top:0; left:0; width: 100%; z-index: 3;">
        <x-header title="Projeto" />
    </div>

    <!-- HERO -->
    <section class="pisos-hero reveal">
        <!-- O print do site será o próprio visual, sem necessidade de textos por cima -->
    </section>

    <!-- DESAFIO E SOLUÇÃO -->
    <section class="container py-5 mt-5">
        <h2 class="mb-5 pb-4 montserrat-500 text-uppercase letter-spacing-2 reveal text-black" style="font-size: 32px">Pisos
            & Cia</h2>
        <div class="row">
            <div class="col-md-6 reveal-left pr-md-5">
                <h5 class="fw-bold mb-4 font-weight-bold text-black text-uppercase" style="font-size: 14px">Desafio</h5>
                <p class="montserrat-300 line-height-lg text-secondary" style="font-size: 16px;">
                    O desafio consistia em atualizar a percepção visual da marca, comunicando com clareza o nível de
                    excelência dos materiais oferecidos para revestimento de alto padrão.
                </p>
            </div>
            <div class="col-md-6 reveal-right pl-md-5">
                <h5 class="fw-bold mb-4 font-weight-bold text-black text-uppercase" style="font-size: 14px">Solução</h5>
                <p class="montserrat-300 line-height-lg text-secondary" style="font-size: 16px;">
                    Criamos um sistema visual elegante. A mistura da paleta sóbria (preto e cinza) com toques de amarelo
                    demonstra expertise e atenção aos detalhes em toda a comunicação institucional e digital.
                </p>
            </div>
        </div>
    </section>

    <!-- MOCKUPS CELULAR E NOTEBOOK -->
    <section class="container py-3">
        <div class="row g-0">
            <div
                class="col-md-6 reveal-left pisos-img-block bg-pisos-yellow d-flex justify-content-center align-items-center">
                <img src="{{ asset('img/projects/PISOS & CIA/Iphone X in Hand Mockup.png') }}" class="img-fluid"
                    style="transform: scale(1.1);" alt="iPhone Mockup">
            </div>
            <div class="col-md-6 reveal-right pisos-img-block bg-light d-flex justify-content-center align-items-center">
                <img src="{{ asset('img/projects/PISOS & CIA/MacBook Air PSD Mockup.png') }}" class="img-fluid"
                    alt="MacBook Mockup">
            </div>
        </div>
    </section>

    <!-- PALETA DE COR -->
    <section class="container py-5 my-5">
        <div class="row align-items-center">
            <div class="col-md-4 reveal-left">
                <h3 class="montserrat-500 mb-4 text-uppercase text-black" style="letter-spacing: 2px; font-size: 18px">
                    Paleta de cor</h3>
            </div>
            <div class="col-md-8 reveal-right">
                <p class="montserrat-300 line-height-lg text-secondary" style="font-size: 16px;">
                    Construída no encontro entre a sofisticação neutra e o ponto focal quente. Tons precisos, minimalistas e
                    marcantes que destacam cada projeto arquitetônico exibido nos showrooms da marca.
                </p>
            </div>
        </div>
        <div class="row mt-5 pt-4 reveal-zoom">
            <div class="col-12 d-flex justify-content-center flex-wrap gap-2">
                <span class="color-dot border" style="background-color: #ffffff;"></span>
                <span class="color-dot" style="background-color: #eaeaea;"></span>
                <span class="color-dot" style="background-color: #c9c9c9;"></span>
                <span class="color-dot" style="background-color: #555555;"></span>
                <span class="color-dot" style="background-color: #2b2c2c;"></span>
                <span class="color-dot" style="background-color: #1c1c1c;"></span>
                <span class="color-dot" style="background-color: #fbd63c;"></span>
                <span class="color-dot" style="background-color: #c8a326;"></span>
            </div>
        </div>
    </section>

    <!-- BANNER PRETO MATERIALIZAR -->
    <section class="container-fluid reveal py-5 my-5" style="background-color: #4b4d4b;">
        <div class="container text-center py-5">
            <h4 class="montserrat-300 text-white font-weight-light"
                style="letter-spacing: 4px; line-height: 2; font-size: 18px;">
                MATERIALIZAR <span style="font-weight: 500;">TRANSPORTANDO IDENTIDADE</span> ATRAVÉS DE UMA MARCA<span
                    style="font-weight: 500;">.</span>
            </h4>
        </div>
    </section>

    <!-- GRID DE MATERIAIS - IDENTIDADE -->
    <section class="container py-2 pb-5">
        <div class="row g-3 reveal-zoom">
            <div class="col-md-3 bg-pisos-yellow d-flex align-items-end p-4">
                <p class="m-0 font-weight-bold" style="font-size: 12px; letter-spacing: 1px">IDENTIDADE</p>
            </div>
            <div class="col-md-6 bg-pisos-dark py-5 px-5 d-flex align-items-center justify-content-center text-center text-white"
                style="min-height: 300px;">
                <h3 class="montserrat-300 m-0" style="letter-spacing: 3px; font-size: 24px;">PISOS & CIA<br><span
                        style="font-size: 10px; opacity: 0.6">REVESTIMENTOS</span></h3>
            </div>
            <div class="col-md-3 text-white" style="background-color: #3b3c3b; padding: 0;">
                <div style="height: 33.33%; background: #404140;"></div>
                <div style="height: 33.33%; background: #5a5a5a;"></div>
                <div class="bg-pisos-yellow" style="height: 33.33%;"></div>
            </div>
        </div>
    </section>

    <!-- GARRAFAS -->
    <section class="container-fluid p-0 my-3 reveal-zoom">
        <img src="{{ asset('img/projects/PISOS & CIA/Two Small Bottle Mockup.png') }}" class="img-fluid w-100"
            style="background: #f4f4f4; max-height: 800px; object-fit: cover;" alt="Bottles">
    </section>

    <!-- MOCKUPS (CAIXA / CARTÃO) -->
    <section class="container py-4 my-2">
        <div class="row g-2">
            <div class="col-md-6 reveal-left">
                <img src="{{ asset('img/projects/PISOS & CIA/15.5 Width x 19 Depth x 14.5 Height3.png') }}"
                    class="img-fluid w-100" style="background: #fdfdfd; min-height: 480px; object-fit: cover;"
                    alt="Box">
            </div>
            <div class="col-md-6 reveal-right">
                <img src="{{ asset('img/projects/PISOS & CIA/Business Women Holding Business Card Mockup.png') }}"
                    class="img-fluid w-100" style="background: #fdfdfd; min-height: 480px; object-fit: cover;"
                    alt="Business Card">
            </div>
        </div>
    </section>

    <!-- MOCKUP (CANECA) -->
    <section class="container-fluid p-0 my-3 reveal-zoom">
        <img src="{{ asset('img/projects/PISOS & CIA/Mug Mockup on Table.png') }}" class="img-fluid w-100"
            style="background: #e2e2e2; max-height: 800px; object-fit: cover;" alt="Mug">
    </section>

    <!-- BANNER EFEITO DE TROCA CATALOGO -->
    <section class="container-fluid p-0 mt-5 reveal d-flex flex-column flex-md-row text-white" style="min-height: 600px;">
        <div
            class="col-md-6 bg-pisos-dark p-5 position-relative d-flex flex-column justify-content-center align-items-center text-center">
            <p class="position-absolute font-weight-bold text-uppercase"
                style="top: 40px; left: 40px; font-size: 14px; letter-spacing: 2px;">EFEITO DE TROCA DE PÁGINA<br>DO
                CATÁLOGO</p>
            <h3 class="montserrat-300 m-0" style="letter-spacing: 3px; font-size: 24px;">PISOS & CIA<br><span
                    style="font-size: 10px; opacity: 0.6">REVESTIMENTOS</span></h3>
            <span class="position-absolute px-3 py-1 bg-pisos-yellow text-dark font-weight-bold"
                style="bottom: 40px; right: 40px; font-size: 12px; letter-spacing: 1px;">PISOS & CIA</span>
        </div>
        <div class="col-md-6 bg-pisos-yellow p-5 text-dark d-flex flex-column justify-content-center">
            <div class="px-md-5">
                <h4 class="fw-bold mb-4 montserrat-500 text-uppercase d-none d-md-block"
                    style="font-size: 80px; opacity: 0.1; line-height: 0.8; margin-top: -100px;">PISOS <br>& CIA</h4>
                <p class="montserrat-500 text-uppercase mb-2" style="font-size: 16px; letter-spacing: 1px;">Visual</p>
                <p class="montserrat-400 text-black mb-5 line-height-lg" style="font-size: 15px;">A experiência fluida no
                    material impresso e digital. Páginas duplas que respiram arq-decor através de grid flexível e tipografia
                    arrojada.</p>

                <p class="montserrat-500 text-uppercase mb-2" style="font-size: 16px; letter-spacing: 1px;">Estilo</p>
                <p class="montserrat-400 text-black mb-5 line-height-lg" style="font-size: 15px;">Fugir de templates
                    batidos da indústria. Layout criativo, editorial e repleto de personalidade que o público consumidor
                    merece.</p>

                <p class="montserrat-500 text-uppercase mb-2" style="font-size: 16px; letter-spacing: 1px;">Valores</p>
                <p class="montserrat-400 text-black mb-5 line-height-lg" style="font-size: 15px;">Tradição unida ao
                    moderno. Uma empresa feita para o presente e desenhada para o futuro focado no cliente e inovação.</p>
            </div>
        </div>
    </section>

    <!-- NAVEGAÇÃO ENTRE PROJETOS -->
    <div class="container py-5 my-5">
        <nav class="project-nav d-flex justify-content-between text-uppercase w-100"
            style="border-top: 1px solid #ccc; padding-top: 30px;">
            <a href="{{ $project['prev_slug'] ? url('/projeto/' . $project['prev_slug']) : '#' }}" class="hover-underline montserrat-400 font-weight-bold text-dark"
                style="font-size: 12px; letter-spacing: 1px;">PROJETO ANTERIOR</a>
            <a href="{{ url('/projetos') }}" class="hover-underline montserrat-400 font-weight-bold text-dark"
                style="font-size: 12px; letter-spacing: 1px;">VER TODOS</a>
            <a href="{{ $project['next_slug'] ? url('/projeto/' . $project['next_slug']) : '#' }}" class="hover-underline montserrat-400 font-weight-bold text-dark"
                style="font-size: 12px; letter-spacing: 1px;">PRÓXIMO PROJETO</a>
        </nav>
    </div>

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

