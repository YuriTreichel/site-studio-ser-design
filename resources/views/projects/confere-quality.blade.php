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

        /* Brochure Section Styles */
        .brochure-section {
            font-family: 'Montserrat', sans-serif;
            margin-top: 4rem;
            margin-bottom: 4rem;
        }
        .quem-somos-panel {
            background-color: #0b1a30;
            color: #ffffff;
            padding: 4rem 3rem;
        }
        .quem-somos-title {
            font-weight: 700;
            font-size: 1.3rem;
            letter-spacing: 2px;
            margin-bottom: 2rem;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            padding-bottom: 1rem;
        }
        .quem-somos-text p {
            font-weight: 300;
            font-size: 0.85rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }
        .quem-somos-text p:last-child {
            margin-bottom: 0;
        }
        .pillars-container {
            display: flex;
            min-height: 450px;
        }
        .pillar-card {
            flex: 1;
            position: relative;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding-bottom: 2.5rem;
            text-decoration: none;
            overflow: hidden;
        }
        .pillar-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(11, 26, 48, 0.1) 0%, rgba(11, 26, 48, 0.8) 100%);
            transition: opacity 0.3s ease;
        }
        .pillar-card:hover::before {
            background: linear-gradient(to bottom, rgba(11, 26, 48, 0.2) 0%, rgba(11, 26, 48, 0.95) 100%);
        }
        .pillar-text-wrapper {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #ffffff;
            font-weight: 600;
            font-size: 1rem;
            line-height: 1.4;
            letter-spacing: 1px;
            transition: transform 0.3s ease;
        }
        .pillar-card:hover .pillar-text-wrapper {
            transform: translateY(-5px);
        }
        .pillar-text-wrapper span {
            display: block;
            font-weight: 400;
            font-size: 0.85rem;
            opacity: 0.85;
            margin-top: 0.2rem;
        }
        .pillar-text-wrapper span.lang-en {
            font-weight: 300;
            font-size: 0.8rem;
            opacity: 0.7;
        }
        .servicos-panel {
            background-color: #272c33;
            color: #ffffff;
            padding: 4rem 3rem;
        }
        .servicos-title {
            font-weight: 700;
            font-size: 1.3rem;
            letter-spacing: 2px;
            margin-bottom: 2.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.15);
            padding-bottom: 1rem;
        }
        .service-item {
            margin-bottom: 2.5rem;
        }
        .service-item:last-child {
            margin-bottom: 0;
        }
        .service-item-title {
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 1px;
            margin-bottom: 1rem;
            line-height: 1.4;
            color: #ffffff;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            padding-bottom: 0.4rem;
        }
        .service-item-desc {
            font-weight: 300;
            font-size: 0.8rem;
            line-height: 1.7;
            margin-bottom: 0.8rem;
            opacity: 0.85;
        }
        .service-item-desc:last-child {
            margin-bottom: 0;
        }
        @media (max-width: 991.98px) {
            .pillars-container {
                min-height: 350px;
            }
        }

        /* Folder Gallery Section */
        .folder-gallery-section {
            margin-top: 6rem;
            margin-bottom: 6rem;
        }
        .folder-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 0;
        }
        @media (max-width: 991.98px) {
            .folder-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 575.98px) {
            .folder-grid {
                grid-template-columns: 1fr;
            }
        }
        .folder-item {
            position: relative;
            cursor: pointer;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .folder-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            flex-grow: 1;
            transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .folder-item:hover img {
            transform: scale(1.05);
        }
        .folder-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(11, 26, 48, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .folder-item:hover .folder-overlay {
            opacity: 1;
        }
        .folder-overlay svg {
            color: #ffffff;
            width: 32px;
            height: 32px;
            transform: scale(0.8);
            transition: transform 0.3s ease;
        }
        .folder-item:hover .folder-overlay svg {
            transform: scale(1);
        }

        /* Lightbox Modal */
        .lightbox-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.95);
            backdrop-filter: blur(8px);
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .lightbox-modal.show {
            display: flex;
            opacity: 1;
        }
        .lightbox-content {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            border-radius: 4px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.5);
            transform: scale(0.95);
            transition: transform 0.3s ease;
        }
        .lightbox-modal.show .lightbox-content {
            transform: scale(1);
        }
        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: #ffffff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.2s ease;
            user-select: none;
            line-height: 1;
        }
        .lightbox-close:hover {
            color: #eaeaea;
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

    <!-- Full-width Image -->
    <section class="container-fluid p-0 mb-5 reveal-zoom" style="margin-top: 7rem;">
        <img src="{{ asset('img/projects/CONFERE QUALITY/2-03.png') }}" class="img-fluid w-100" alt="CONFERE QUALITY banner">
    </section>

    <!-- Linhas Guias Image -->
    <section class="container text-center mb-5 pb-5 reveal-zoom" style="margin-top: 7rem;">
        <img src="{{ asset('img/projects/CONFERE QUALITY/linhas-guias.png') }}" class="img-fluid" style="max-width: 1200px; border-radius: 8px;" alt="CONFERE QUALITY linhas guias">
    </section>

    <!-- Colors Section -->
    <section class="container mb-5 pb-5 reveal-zoom" style="margin-top: 7rem; font-family: 'Montserrat', sans-serif;">
        <style>
            .color-palette-container {
                width: 100%;
                max-width: 450px;
                height: 500px;
                border: 1px solid #eaeaea;
                box-shadow: 0 10px 30px rgba(0,0,0,0.05);
                border-radius: 8px;
                overflow: hidden;
                display: flex;
            }
            .color-bar {
                flex: 1;
                transition: flex 0.4s cubic-bezier(0.25, 1, 0.5, 1);
                cursor: pointer;
            }
            .color-bar:hover {
                flex: 1.5;
            }
        </style>
        <div class="row align-items-center">
            <!-- Palette Block -->
            <div class="col-md-6 mb-5 mb-md-0 d-flex justify-content-center">
                <div class="color-palette-container">
                    <div class="color-bar" style="background-color: #020413;" title="#020413"></div>
                    <div class="color-bar" style="background-color: #11233d;" title="#11233d"></div>
                    <div class="color-bar" style="background-color: #324043;" title="#324043"></div>
                    <div class="color-bar" style="background-color: #7d8c92;" title="#7d8c92"></div>
                    <div class="color-bar" style="background-color: #ffffff; border-left: 1px solid #f0f0f0;" title="#ffffff"></div>
                </div>
            </div>
            <!-- Descriptions -->
            <div class="col-md-6 ps-md-5">
                <div class="color-desc-item mb-4">
                    <p class="montserrat-300" style="font-size: 0.95rem; line-height: 1.6; color: #2b2c2c;">
                        <strong class="montserrat-700" style="color: #0b1a30; letter-spacing: 0.5px;">AZUL:</strong> simboliza confiança, responsabilidade e seriedade, uma cor associada à integridade.
                    </p>
                </div>
                <div class="color-desc-item mb-4">
                    <p class="montserrat-300" style="font-size: 0.95rem; line-height: 1.6; color: #2b2c2c;">
                        <strong class="montserrat-700" style="color: #0b1a30; letter-spacing: 0.5px;">TONS DE AZUL ESCURO:</strong> transmitem segurança e confiabilidade, e especialmente autoridade.
                    </p>
                </div>
                <div class="color-desc-item mb-4">
                    <p class="montserrat-300" style="font-size: 0.95rem; line-height: 1.6; color: #2b2c2c;">
                        <strong class="montserrat-700" style="color: #0b1a30; letter-spacing: 0.5px;">VERDE:</strong> representa equilíbrio, crescimento e segurança.
                    </p>
                </div>
                <div class="color-desc-item mb-4">
                    <p class="montserrat-300" style="font-size: 0.95rem; line-height: 1.6; color: #2b2c2c;">
                        <strong class="montserrat-700" style="color: #0b1a30; letter-spacing: 0.5px;">CINZA:</strong> simboliza neutralidade, imparcialidade, profissionalismo, equilíbrio e confiança.
                    </p>
                </div>
                <div class="color-desc-item mb-4">
                    <p class="montserrat-300" style="font-size: 0.95rem; line-height: 1.6; color: #2b2c2c;">
                        <strong class="montserrat-700" style="color: #0b1a30; letter-spacing: 0.5px;">BRANCO:</strong> representa clareza, transparência, honestidade aspectos fundamentais da integridade, que reforça a confiança.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="project-gallery container pb-5" style="max-width: 1200px; margin: 0 auto;">
        @if(count($project['images']) >= 4)
            <div class="row g-4 mb-4">
                <div class="col-md-6 d-flex align-items-stretch">
                    <img src="{{ asset($project['images'][1]) }}" alt="{{ $project['name'] }} gallery image"
                        class="img-fluid w-100 reveal-zoom" style="border-radius: 8px; object-fit: cover;">
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                    <img src="{{ asset($project['images'][2]) }}" alt="{{ $project['name'] }} gallery image"
                        class="img-fluid w-100 reveal-zoom" style="border-radius: 8px; object-fit: cover;">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset($project['images'][3]) }}" alt="{{ $project['name'] }} gallery image"
                        class="img-fluid w-100 reveal-zoom" style="border-radius: 8px;">
                </div>
            </div>
        @else
            <div class="text-center">
                @foreach (array_slice($project['images'], 1) as $img)
                    <img src="{{ asset($img) }}" alt="{{ $project['name'] }} gallery image"
                        class="img-fluid mb-5 w-100 reveal-zoom" style="max-width: 1200px; border-radius: 8px;">
                @endforeach
            </div>
        @endif
    </section>

    <!-- Brochure Section Layout -->
    <section class="brochure-section container-fluid px-0">
        <div class="row g-0">
            <!-- Left Side: Quem Somos + Pillars (Integridade, Segurança, Confiança) -->
            <div class="col-xl-6 d-flex flex-column flex-md-row">
                <div class="quem-somos-panel flex-grow-1 d-flex flex-column" style="flex: 1.2;">
                    <h2 class="quem-somos-title text-uppercase">Quem Somos | Quiénes Somos | Who We Are</h2>
                    <div class="quem-somos-text">
                        <p>Atuamos há mais de 18 anos na realização de inspeções de qualidade em fábricas, com sede em Garibaldi (RS) e operações em diversos estados do Brasil. Com base na confiança, seriedade e comprometimento, garantimos que todos os serviços sejam executados conforme o acordado. Nossas inspeções seguem normas técnicas rigorosas, assegurando a qualidade do produto final, o que traz segurança ao comprador e ao cliente, além de auxiliar as fábricas no controle de seus processos, evitando retrabalho, custos extras e desperdício de tempo.</p>
                        <p>Llevamos más de 18 años realizando inspecciones de calidad en fábricas, con sede en Garibaldi (RS) y operaciones en varios estados de Brasil. Basados en la confianza, la seriedad y el compromiso, garantizamos que todos los servicios se ejecuten según lo acordado. Nuestras inspecciones siguen estrictas normas técnicas, asegurando la calidad del producto final, lo que brinda seguridad al comprador y al cliente, además de ayudar a las fábricas en el control de sus procesos, evitando retrabajos, costos adicionales y pérdida de tempo.</p>
                        <p>We have been performing quality inspections in factories for over 18 years, with headquarters in Garibaldi (RS) and operations in several states across Brazil. Based on trust, integrity and commitment, we ensure that all services are carried out as agreed. Our inspections follow strict technical standards, ensuring the quality of the final product, which provides security for buyers and customers, while also helping factories control their processes, avoiding rework, extra costs and wasted time.</p>
                    </div>
                </div>
                <div class="pillars-container" style="flex: 1;">
                    <!-- Integridade -->
                    <div class="pillar-card" style="background-image: url('{{ asset('img/projects/CONFERE QUALITY/integrity.png') }}')">
                        <div class="pillar-text-wrapper">
                            <div>Integridade</div>
                            <span>Integridad</span>
                            <span class="lang-en">Integrity</span>
                        </div>
                    </div>
                    <!-- Segurança -->
                    <div class="pillar-card" style="background-image: url('{{ asset('img/projects/CONFERE QUALITY/safety.png') }}')">
                        <div class="pillar-text-wrapper">
                            <div>Segurança</div>
                            <span>Seguridad</span>
                            <span class="lang-en">Safety</span>
                        </div>
                    </div>
                    <!-- Confiança -->
                    <div class="pillar-card" style="background-image: url('{{ asset('img/projects/CONFERE QUALITY/trust.png') }}')">
                        <div class="pillar-text-wrapper">
                            <div>Confiança</div>
                            <span>Confianza</span>
                            <span class="lang-en">Trust</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Serviços -->
            <div class="col-xl-6 servicos-panel">
                <h2 class="servicos-title text-uppercase">Serviços | Servicios | Services</h2>
                <div class="row">
                    <!-- Column 1 -->
                    <div class="col-md-6">
                        <!-- Auditorias de Fábrica -->
                        <div class="service-item">
                            <h3 class="service-item-title text-uppercase">Auditorias de Fábrica | Auditorías de Fábrica | Factory Audits</h3>
                            <p class="service-item-desc">As avaliações de fábrica são realizadas para fornecer uma impressão concreta sobre o seu fornecedor, verificando se poderá satisfazer às suas necessidades, com compromisso com a qualidade e a entrega dos produtos.</p>
                            <p class="service-item-desc">Las evaluaciones de fábrica se realizan para proporcionar una impresión concreta sobre su proveedor, verificando si podrá satisfacer sus necesidades, con compromiso con la calidad y la entrega de los productos.</p>
                            <p class="service-item-desc">Factory evaluations are conducted to get a concrete impression of your supplier, verifying if they will be able to meet your needs, quality commitments and product deliveries.</p>
                        </div>
                        <!-- Inspeção de Container -->
                        <div class="service-item">
                            <h3 class="service-item-title text-uppercase">Inspeção de Container | Inspección en Container | Container Inspection</h3>
                            <p class="service-item-desc">Oferecemos inspeção de container em portos ou fábricas, revisando e acompanhando o processo de estufagem até o fechamento de portas.</p>
                            <p class="service-item-desc">Ofrecemos inspección de contenedores en puertos o fábricas, revisando y supervisando el proceso de estiba hasta el cierre de las puertas.</p>
                            <p class="service-item-desc">We offer container inspection at ports or factories, reviewing and monitoring the stuffing process until the doors are closed.</p>
                        </div>
                        <!-- Inspeção de Móveis -->
                        <div class="service-item">
                            <h3 class="service-item-title text-uppercase">Inspeção de Móveis | Inspección de Muebles | Furniture Inspection</h3>
                            <p class="service-item-desc">Revisão de qualidade de produto, embalagens e requerimentos especiais.</p>
                            <p class="service-item-desc">Revisión de calidad de productos, embalajes y requisitos especiales.</p>
                            <p class="service-item-desc">Product quality, packaging and special requirements review.</p>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="col-md-6">
                        <!-- Inspeção de Revestimentos Cerâmicos -->
                        <div class="service-item">
                            <h3 class="service-item-title text-uppercase">Inspeção de Revestimentos Cerâmicos | Inspección de Revestimiento Cerámico | Ceramic Tiles Inspection</h3>
                            <p class="service-item-desc">Conformidade de produto conforme normas NBR e ISO 13006 anexo "A, G e U". Qualidade de produto de acordo com as normas NBR, embalagens e requerimentos especiais.</p>
                            <p class="service-item-desc">Conformidad del producto conforme a las normas NBR y al anexo "A, G y U" de la ISO 13006. Calidad del producto según las normas NBR, embalajes y requisitos especiales.</p>
                            <p class="service-item-desc">Product compliance according to NBR standards and ISO 13006 annexes "A, G and U". Product quality in accordance with NBR standards, packaging and special requirements.</p>
                        </div>
                        <!-- Inspeção de Compensado -->
                        <div class="service-item">
                            <h3 class="service-item-title text-uppercase">Inspeção de Compensado | Inspección de Compensado | Plywood Inspection</h3>
                            <p class="service-item-desc">A inspeção segue critérios e especificações, verificando se o produto corresponde a classificação e a qualidade esperadas, realizando provas visuais da superfície, verificação dimensional, medição de umidade e teste de colagem das camadas.</p>
                            <p class="service-item-desc">La inspección sigue criterios y especificaciones, verificando si el producto corresponde a la clasificación y calidad esperadas, realizando pruebas visuales de la superficie, verificación dimensional, medición de humedad y prueba de adhesión de las capas.</p>
                            <p class="service-item-desc">The inspection follows criteria and specifications, verifying whether the product meets the expected classification and quality by performing visual surface tests, dimensional checks, moisture measurement and layer bonding tests.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Folder Section -->
    <section class="folder-gallery-section container-fluid px-0 reveal-zoom">
        <div class="folder-grid">
            <div class="folder-item" onclick="openLightbox(this)">
                <img src="{{ asset('img/projects/CONFERE QUALITY/folder_1.png') }}" alt="Folder Página 1">
                <div class="folder-overlay">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.637 10.637zM10.5 7.5v6m3-3h-6" />
                    </svg>
                </div>
            </div>
            <div class="folder-item" onclick="openLightbox(this)">
                <img src="{{ asset('img/projects/CONFERE QUALITY/folder_2.png') }}" alt="Folder Página 2">
                <div class="folder-overlay">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.637 10.637zM10.5 7.5v6m3-3h-6" />
                    </svg>
                </div>
            </div>
            <div class="folder-item" onclick="openLightbox(this)">
                <img src="{{ asset('img/projects/CONFERE QUALITY/folder_3.png') }}" alt="Folder Página 3">
                <div class="folder-overlay">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.637 10.637zM10.5 7.5v6m3-3h-6" />
                    </svg>
                </div>
            </div>
            <div class="folder-item" onclick="openLightbox(this)">
                <img src="{{ asset('img/projects/CONFERE QUALITY/folder_4.png') }}" alt="Folder Página 4">
                <div class="folder-overlay">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.637 10.637zM10.5 7.5v6m3-3h-6" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightboxModal" class="lightbox-modal" onclick="closeLightbox(event)">
        <span class="lightbox-close" onclick="closeLightbox(event)">&times;</span>
        <img class="lightbox-content" id="lightboxImg" src="" alt="Folder Ampliado">
    </div>

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

        function openLightbox(element) {
            const imgSrc = element.querySelector('img').getAttribute('src');
            const modal = document.getElementById('lightboxModal');
            const modalImg = document.getElementById('lightboxImg');
            modalImg.src = imgSrc;
            modal.style.display = 'flex';
            setTimeout(() => {
                modal.classList.add('show');
            }, 10);
        }

        function closeLightbox(event) {
            const modal = document.getElementById('lightboxModal');
            modal.classList.remove('show');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 300);
        }
    </script>

@endsection


