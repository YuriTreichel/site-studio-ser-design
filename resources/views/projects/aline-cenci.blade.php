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

        .project-intro {
            padding-top: 100px;
            padding-bottom: 100px;
        }

        .project-category {
            font-size: 0.8rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #999;
            text-align: right;
            margin-bottom: 40px;
        }

        .project-title-large {
            font-size: 4rem;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: #2b2c2c;
            margin-bottom: 80px;
            font-weight: 400;
        }

        .project-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
        }

        .project-info-block h3 {
            font-size: 1.2rem;
            font-weight: 700;
            text-transform: none;
            margin-bottom: 25px;
            color: #2b2c2c;
        }

        .project-info-block p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
            text-align: justify;
        }

        @media (max-width: 768px) {
            .project-title-large {
                font-size: 2.5rem;
            }
            .project-info-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
        }

        .floating-element {
            animation: floating 6s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(1deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        .full-width-image-container {
            width: 100%;
            height: 800px;
            overflow: hidden;
            margin-bottom: 80px;
        }

        .full-width-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .project-grid-2-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 80px;
        }

        .project-grid-2-col img {
            width: 100%;
            height: 600px;
            object-fit: cover;
            border-radius: 4px;
        }

        @media (max-width: 768px) {
            .project-grid-2-col {
                grid-template-columns: 1fr;
            }
        }

        /* Seção do Manual PDF */
        .brand-manual-section {
            background-color: #a6563d;
            padding: 60px 0;
            overflow: hidden;
            margin-top: 80px;
        }

        .brand-manual-title {
            color: #ffffff;
            font-size: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-align: center;
            margin-bottom: 60px;
        }

        .pdf-horizontal-container {
            display: flex;
            overflow-x: auto;
            overflow-y: hidden;
            gap: 30px;
            padding: 0 50px 40px;
            scroll-snap-type: x mandatory;
            cursor: grab;
            -webkit-overflow-scrolling: touch;
        }

        .pdf-horizontal-container:active {
            cursor: grabbing;
        }

        .pdf-horizontal-container::-webkit-scrollbar {
            height: 8px;
        }

        .pdf-horizontal-container::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .pdf-horizontal-container::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .pdf-page-wrapper {
            flex: 0 0 auto;
            scroll-snap-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            background: white;
            transition: transform 0.3s ease;
            height: fit-content;
        }

        .pdf-page-wrapper:hover {
            transform: translateY(-10px);
        }

        .pdf-page-wrapper canvas {
            display: block;
            max-width: 100%;
            height: 60vh;
            width: auto;
            border-radius: 4px;
        }

        /* Nova Seção de Grid Multi-Linha */
        .project-multi-grid {
            padding: 80px 0;
        }

        .multi-grid-row {
            display: grid;
            gap: 30px;
            margin-bottom: 30px;
        }

        .multi-grid-row-2 {
            grid-template-columns: 1fr 1fr;
        }

        .multi-grid-row-1 {
            grid-template-columns: 1fr;
        }

        .project-multi-grid img {
            width: 100%;
            height: 600px;
            object-fit: cover;
            border-radius: 4px;
        }

        .multi-grid-row-1 img {
            height: 700px; /* Altura menor para a imagem de destaque central */
        }

        @media (max-width: 768px) {
            .multi-grid-row-2 {
                grid-template-columns: 1fr;
            }
            .project-multi-grid img {
                height: 400px;
            }
        }

        /* Seção de Citação / Frase */
        .project-quote-container {
            margin-top: 180px;
            margin-bottom: 120px;
        }

        .project-quote-text {
            font-family: 'Tenor Sans', sans-serif;
            font-size: 3.2rem;
            color: #2b2c2c;
            line-height: 1.6;
            letter-spacing: 1px;
        }

        .project-quote-text span {
            font-family: 'Dancing Script', cursive;
            font-size: 1.25em;
            font-style: normal;
            text-transform: none;
        }

        @media (max-width: 768px) {
            .project-quote-container {
                margin-top: 90px;
                margin-bottom: 60px;
            }
            .project-quote-text {
                font-size: 2.2rem;
                line-height: 1.4;
            }
        }
    </style>

    <section class="text-white d-block position-relative" style="min-height: 100vh; overflow: hidden;">
        <!-- Vídeo de Fundo -->
        <video autoplay loop muted playsinline 
            style="position: absolute; top: 50%; left: 50%; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: 0; transform: translateX(-50%) translateY(-50%); object-fit: cover;">
            <source src="{{ asset('videos/aline-cenci-conceito.mp4') }}" type="video/mp4">
        </video>



        <!-- Header fixo no topo da seção -->
        <div style="position: absolute; top:0; left:0; width: 100%; z-index: 3;">
            <x-header title="Projeto" />
        </div>
    </section>

    <section class="project-intro container">
        <div class="project-category montserrat-400">
            ESTRATÉGIA, IDENTIDADE VISUAL
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

    {{-- Galeria customizada --}}
    <section class="project-gallery-new container-fluid px-0">
        {{-- Imagem de largura inteira com efeito de flutuação --}}
        @if(count($project['images']) > 1)
            <div class="full-width-image-container floating-element">
                <img src="{{ asset($project['images'][1]) }}" alt="Full width gallery image" class="reveal-zoom">
            </div>
        @endif

        {{-- Grid de 2 colunas --}}
        <div class="container">
            <div class="project-grid-2-col">
                <img src="{{ asset('img/projects/ALINE CENCI/Printed Logo Mockup.png') }}" alt="Gallery image" class="reveal-zoom">
                <img src="{{ asset('img/projects/ALINE CENCI/7.png') }}" alt="Gallery image" class="reveal-zoom">
            </div>
        </div>
    </section>

    {{-- Seção do Manual de Identidade --}}
    <section class="brand-manual-section">
        <div id="pdf-horizontal-scroller" class="pdf-horizontal-container">
            {{-- Canvas das páginas serão inseridos aqui pelo JS --}}
        </div>
    </section>

    {{-- Seção de Citação / Frase --}}
    <section class="project-quote-container container text-center">
        <h2 class="project-quote-text reveal">
            Florescer exige <span>passar</span> por <br> todas as <span>estações</span>.
        </h2>
    </section>

    {{-- Nova Seção de Grid de Imagens --}}
    <section class="project-multi-grid container">
        {{-- Primeira linha: 2 imagens --}}
        <div class="multi-grid-row multi-grid-row-2">
            <img src="{{ asset('img/projects/ALINE CENCI/Falling-Business-Cards-Identity-Free-psd-Mockup.png') }}" alt="Gallery image" class="reveal-zoom">
            <img src="{{ asset('img/projects/ALINE CENCI/Free Pillow on Chair Mockup2.png') }}" alt="Gallery image" class="reveal-zoom">
        </div>

        {{-- Segunda linha: 1 imagem --}}
        <div class="multi-grid-row multi-grid-row-1">
            <img src="{{ asset('img/projects/ALINE CENCI/Dishes Mockup3.png') }}" alt="Gallery image" class="reveal-zoom">
            
        </div>

        {{-- Terceira linha: 2 imagens --}}
        <div class="multi-grid-row multi-grid-row-2">
            <img src="{{ asset('img/projects/ALINE CENCI/Free Cotton Bag Mockup.png') }}" alt="Gallery image" class="reveal-zoom">
            <img src="{{ asset('img/projects/ALINE CENCI/Levitating Notebook Mockup.png') }}" alt="Gallery image" class="reveal-zoom">
        </div>
    </section>

    <nav class="project-nav montserrat-400">
        <a href="{{ $project['prev_slug'] ? url('/projeto/' . $project['prev_slug']) : '#' }}" class="hover-underline nav-prev-link">projeto anterior</a>
        <a href="{{ url('/projetos') }}" class="hover-underline nav-all-link">ver todos</a>
        <a href="{{ $project['next_slug'] ? url('/projeto/' . $project['next_slug']) : '#' }}" class="hover-underline nav-next-link">projeto seguinte</a>
    </nav>

    <x-footer />

    {{-- Script PDF.js e Lógica de Renderização --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script>
        const pdfUrl = "{{ asset('img/projects/ALINE CENCI/MANUAL DE IDENTIDADE VISUAL ALINE CENCI.pdf') }}";
        const pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

        async function renderPDF() {
            try {
                const loadingTask = pdfjsLib.getDocument(pdfUrl);
                const pdf = await loadingTask.promise;
                const container = document.getElementById('pdf-horizontal-scroller');
                
                // Ativar drag-to-scroll e funcionalidade "wheel" imediatamente
                initDragScroll(container);

                for (let i = 1; i <= pdf.numPages; i++) {
                    const page = await pdf.getPage(i);
                    const viewport = page.getViewport({ scale: 1.5 }); // Escala para melhor qualidade
                    
                    const wrapper = document.createElement('div');
                    wrapper.className = 'pdf-page-wrapper reveal-bottom';
                    
                    const canvas = document.createElement('canvas');
                    const context = canvas.getContext('2d');
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    const renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };

                    await page.render(renderContext).promise;
                    wrapper.appendChild(canvas);
                    container.appendChild(wrapper);
                }

            } catch (error) {
                console.error('Erro ao carregar o PDF:', error);
            }
        }

        function initDragScroll(slider) {
            let isDown = false;
            let startX;
            let scrollLeft;

            // Suporte para scroll horizontal com a rodinha do mouse
            slider.addEventListener('wheel', (e) => {
                // Intercepta a rolagem vertical
                if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
                    
                    const isAtStart = slider.scrollLeft === 0;
                    // Arredondando para facilitar check (as vezes há fração de pixel)
                    const isAtEnd = Math.ceil(slider.scrollLeft + slider.clientWidth) >= slider.scrollWidth;

                    // Se estiver rolando para cima (deltaY < 0) no início, ou
                    // Se estiver rolando para baixo (deltaY > 0) no final
                    if ((e.deltaY < 0 && isAtStart) || (e.deltaY > 0 && isAtEnd)) {
                        return; // O scroll da página ocorrerá normalmente
                    }

                    e.preventDefault();
                    // Multiplicador para garantir que a rolagem seja perceptível
                    // mesmo se o scroll-snap estiver ativo
                    slider.scrollBy({
                        left: e.deltaY * 3, 
                        behavior: 'smooth'
                    });
                }
            }, { passive: false });

            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                slider.classList.add('active');
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });
            slider.addEventListener('mouseleave', () => {
                isDown = false;
            });
            slider.addEventListener('mouseup', () => {
                isDown = false;
            });
            slider.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 2; // scroll-fast
                slider.scrollLeft = scrollLeft - walk;
            });
        }

        window.addEventListener('load', renderPDF);

        window.addEventListener('scroll', () => {
            if (window.scrollY > 80) {
                document.body.classList.add('project-scrolled');
            } else {
                document.body.classList.remove('project-scrolled');
            }
        });
    </script>

@endsection

