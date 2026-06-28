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

    {{-- Seção Citação com Dentes de Leão --}}
    <section class="francine-quote-section" style="
        background-color: #C2CFA0;
        position: relative;
        overflow: hidden;
        padding: 160px 40px;
        min-height: 520px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        margin-bottom: 80px;
    ">
        {{-- Dentes de leão flutuando (SVGs individuais com linhas mais visíveis) --}}
        <svg class="dandelion-seed dandelion-seed-1" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="20" stroke="rgba(255,255,255,0.85)" stroke-width="1.5"/>
            <line x1="30" y1="20" x2="20" y2="8" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="40" y2="8" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="30" y2="5" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="15" y2="14" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="20" x2="45" y2="14" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="20" x2="24" y2="6" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <line x1="30" y1="20" x2="36" y2="6" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <circle cx="30" cy="20" r="2.0" fill="rgba(255,255,255,0.9)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-2" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="20" stroke="rgba(255,255,255,0.8)" stroke-width="1.3"/>
            <line x1="30" y1="20" x2="18" y2="9" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="20" x2="42" y2="9" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="20" x2="30" y2="4" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="20" x2="14" y2="15" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <line x1="30" y1="20" x2="46" y2="15" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <circle cx="30" cy="20" r="1.8" fill="rgba(255,255,255,0.85)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-3" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="22" stroke="rgba(255,255,255,0.9)" stroke-width="1.6"/>
            <line x1="30" y1="22" x2="19" y2="7" stroke="rgba(255,255,255,0.9)" stroke-width="1.3"/>
            <line x1="30" y1="22" x2="41" y2="7" stroke="rgba(255,255,255,0.9)" stroke-width="1.3"/>
            <line x1="30" y1="22" x2="30" y2="5" stroke="rgba(255,255,255,0.9)" stroke-width="1.3"/>
            <line x1="30" y1="22" x2="16" y2="13" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="22" x2="44" y2="13" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="22" x2="22" y2="8" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <line x1="30" y1="22" x2="38" y2="8" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <circle cx="30" cy="22" r="2.2" fill="rgba(255,255,255,0.9)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-4" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="18" stroke="rgba(255,255,255,0.75)" stroke-width="1.3"/>
            <line x1="30" y1="18" x2="21" y2="6" stroke="rgba(255,255,255,0.75)" stroke-width="1.1"/>
            <line x1="30" y1="18" x2="39" y2="6" stroke="rgba(255,255,255,0.75)" stroke-width="1.1"/>
            <line x1="30" y1="18" x2="30" y2="3" stroke="rgba(255,255,255,0.75)" stroke-width="1.1"/>
            <line x1="30" y1="18" x2="17" y2="12" stroke="rgba(255,255,255,0.7)" stroke-width="0.9"/>
            <line x1="30" y1="18" x2="43" y2="12" stroke="rgba(255,255,255,0.7)" stroke-width="0.9"/>
            <circle cx="30" cy="18" r="1.6" fill="rgba(255,255,255,0.8)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-5" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="20" stroke="rgba(255,255,255,0.85)" stroke-width="1.5"/>
            <line x1="30" y1="20" x2="20" y2="8" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="40" y2="8" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="30" y2="5" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="14" y2="14" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="20" x2="46" y2="14" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <circle cx="30" cy="20" r="2.0" fill="rgba(255,255,255,0.9)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-6" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="21" stroke="rgba(255,255,255,0.8)" stroke-width="1.3"/>
            <line x1="30" y1="21" x2="22" y2="10" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="21" x2="38" y2="10" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="21" x2="30" y2="6" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="21" x2="16" y2="16" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <line x1="30" y1="21" x2="44" y2="16" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <circle cx="30" cy="21" r="1.8" fill="rgba(255,255,255,0.85)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-7" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="19" stroke="rgba(255,255,255,0.85)" stroke-width="1.5"/>
            <line x1="30" y1="19" x2="18" y2="7" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="19" x2="42" y2="7" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="19" x2="30" y2="3" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="19" x2="13" y2="12" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="19" x2="47" y2="12" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="19" x2="24" y2="5" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <line x1="30" y1="19" x2="36" y2="5" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <circle cx="30" cy="19" r="2.0" fill="rgba(255,255,255,0.9)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-8" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="22" stroke="rgba(255,255,255,0.75)" stroke-width="1.3"/>
            <line x1="30" y1="22" x2="20" y2="10" stroke="rgba(255,255,255,0.75)" stroke-width="1.1"/>
            <line x1="30" y1="22" x2="40" y2="10" stroke="rgba(255,255,255,0.75)" stroke-width="1.1"/>
            <line x1="30" y1="22" x2="30" y2="6" stroke="rgba(255,255,255,0.75)" stroke-width="1.1"/>
            <line x1="30" y1="22" x2="15" y2="15" stroke="rgba(255,255,255,0.7)" stroke-width="0.9"/>
            <line x1="30" y1="22" x2="45" y2="15" stroke="rgba(255,255,255,0.7)" stroke-width="0.9"/>
            <circle cx="30" cy="22" r="1.6" fill="rgba(255,255,255,0.8)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-9" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="20" stroke="rgba(255,255,255,0.9)" stroke-width="1.6"/>
            <line x1="30" y1="20" x2="19" y2="8" stroke="rgba(255,255,255,0.9)" stroke-width="1.3"/>
            <line x1="30" y1="20" x2="41" y2="8" stroke="rgba(255,255,255,0.9)" stroke-width="1.3"/>
            <line x1="30" y1="20" x2="30" y2="4" stroke="rgba(255,255,255,0.9)" stroke-width="1.3"/>
            <line x1="30" y1="20" x2="14" y2="13" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="20" x2="46" y2="13" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="20" x2="23" y2="6" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <line x1="30" y1="20" x2="37" y2="6" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <circle cx="30" cy="20" r="2.2" fill="rgba(255,255,255,0.95)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-10" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="21" stroke="rgba(255,255,255,0.8)" stroke-width="1.3"/>
            <line x1="30" y1="21" x2="21" y2="9" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="21" x2="39" y2="9" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="21" x2="30" y2="5" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="21" x2="16" y2="14" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <line x1="30" y1="21" x2="44" y2="14" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <circle cx="30" cy="21" r="1.8" fill="rgba(255,255,255,0.85)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-11" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="20" stroke="rgba(255,255,255,0.85)" stroke-width="1.5"/>
            <line x1="30" y1="20" x2="17" y2="7" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="43" y2="7" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="30" y2="3" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="12" y2="13" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="20" x2="48" y2="13" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <circle cx="30" cy="20" r="2.0" fill="rgba(255,255,255,0.9)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-12" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="19" stroke="rgba(255,255,255,0.75)" stroke-width="1.3"/>
            <line x1="30" y1="19" x2="22" y2="8" stroke="rgba(255,255,255,0.75)" stroke-width="1.1"/>
            <line x1="30" y1="19" x2="38" y2="8" stroke="rgba(255,255,255,0.75)" stroke-width="1.1"/>
            <line x1="30" y1="19" x2="30" y2="4" stroke="rgba(255,255,255,0.75)" stroke-width="1.1"/>
            <line x1="30" y1="19" x2="17" y2="13" stroke="rgba(255,255,255,0.7)" stroke-width="0.9"/>
            <line x1="30" y1="19" x2="43" y2="13" stroke="rgba(255,255,255,0.7)" stroke-width="0.9"/>
            <circle cx="30" cy="19" r="1.6" fill="rgba(255,255,255,0.8)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-13" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="20" stroke="rgba(255,255,255,0.85)" stroke-width="1.5"/>
            <line x1="30" y1="20" x2="20" y2="8" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="40" y2="8" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="30" y2="5" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="15" y2="14" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="20" x2="45" y2="14" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="20" x2="24" y2="6" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <line x1="30" y1="20" x2="36" y2="6" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <circle cx="30" cy="20" r="2.0" fill="rgba(255,255,255,0.9)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-14" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="21" stroke="rgba(255,255,255,0.8)" stroke-width="1.3"/>
            <line x1="30" y1="21" x2="19" y2="9" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="21" x2="41" y2="9" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="21" x2="30" y2="5" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="21" x2="15" y2="15" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <line x1="30" y1="21" x2="45" y2="15" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <circle cx="30" cy="21" r="1.8" fill="rgba(255,255,255,0.85)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-15" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="20" stroke="rgba(255,255,255,0.9)" stroke-width="1.6"/>
            <line x1="30" y1="20" x2="18" y2="7" stroke="rgba(255,255,255,0.9)" stroke-width="1.3"/>
            <line x1="30" y1="20" x2="42" y2="7" stroke="rgba(255,255,255,0.9)" stroke-width="1.3"/>
            <line x1="30" y1="20" x2="30" y2="3" stroke="rgba(255,255,255,0.9)" stroke-width="1.3"/>
            <line x1="30" y1="20" x2="13" y2="12" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="20" x2="47" y2="12" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="20" x2="23" y2="5" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <line x1="30" y1="20" x2="37" y2="5" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <circle cx="30" cy="20" r="2.2" fill="rgba(255,255,255,0.95)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-16" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="22" stroke="rgba(255,255,255,0.75)" stroke-width="1.3"/>
            <line x1="30" y1="22" x2="21" y2="10" stroke="rgba(255,255,255,0.75)" stroke-width="1.1"/>
            <line x1="30" y1="22" x2="39" y2="10" stroke="rgba(255,255,255,0.75)" stroke-width="1.1"/>
            <line x1="30" y1="22" x2="30" y2="6" stroke="rgba(255,255,255,0.75)" stroke-width="1.1"/>
            <line x1="30" y1="22" x2="16" y2="16" stroke="rgba(255,255,255,0.7)" stroke-width="0.9"/>
            <line x1="30" y1="22" x2="44" y2="16" stroke="rgba(255,255,255,0.7)" stroke-width="0.9"/>
            <circle cx="30" cy="22" r="1.6" fill="rgba(255,255,255,0.8)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-17" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="20" stroke="rgba(255,255,255,0.85)" stroke-width="1.5"/>
            <line x1="30" y1="20" x2="20" y2="8" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="40" y2="8" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="30" y2="5" stroke="rgba(255,255,255,0.85)" stroke-width="1.2"/>
            <line x1="30" y1="20" x2="14" y2="14" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <line x1="30" y1="20" x2="46" y2="14" stroke="rgba(255,255,255,0.8)" stroke-width="1.0"/>
            <circle cx="30" cy="20" r="2.0" fill="rgba(255,255,255,0.9)"/>
        </svg>

        <svg class="dandelion-seed dandelion-seed-18" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="30" y1="55" x2="30" y2="19" stroke="rgba(255,255,255,0.8)" stroke-width="1.3"/>
            <line x1="30" y1="19" x2="18" y2="7" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="19" x2="42" y2="7" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="19" x2="30" y2="3" stroke="rgba(255,255,255,0.8)" stroke-width="1.1"/>
            <line x1="30" y1="19" x2="15" y2="13" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <line x1="30" y1="19" x2="45" y2="13" stroke="rgba(255,255,255,0.75)" stroke-width="0.9"/>
            <circle cx="30" cy="19" r="1.8" fill="rgba(255,255,255,0.85)"/>
        </svg>

        {{-- Texto da citação (Fontes e tamanhos ajustados) --}}
        <div class="francine-quote-text" style="
            position: relative;
            z-index: 2;
            max-width: 580px;
            text-align: right;
            margin-right: 10%;
        ">
            <p class="montserrat-300" style="
                color: #5c623b;
                font-size: 1.6rem;
                line-height: 1.8;
                letter-spacing: 0.03em;
                margin-bottom: 1.5rem;
            ">
                "A liberdade é a capacidade de<br>
                decidir-se a si mesmo para um<br>
                determinado agir ou sua omissão."
            </p>
            <p class="montserrat-400" style="
                color: #4a512c;
                font-size: 1.3rem;
                text-align: right;
            ">
                Aristóteles
            </p>
        </div>
    </section>

    <style>
        /* Dandelion seeds - posicionamento e animação */
        .dandelion-seed {
            position: absolute;
            z-index: 1;
            pointer-events: none;
        }

        .dandelion-seed-1 {
            width: 70px; top: 15%; left: 8%;
            opacity: 0.95;
            animation: floatSeed1 12s ease-in-out infinite;
            transform: rotate(-25deg);
        }
        .dandelion-seed-2 {
            width: 55px; top: 25%; left: 18%;
            opacity: 0.85;
            animation: floatSeed2 15s ease-in-out infinite 2s;
            transform: rotate(15deg);
        }
        .dandelion-seed-3 {
            width: 85px; top: 8%; left: 28%;
            opacity: 0.9;
            animation: floatSeed3 18s ease-in-out infinite 1s;
            transform: rotate(-40deg);
        }
        .dandelion-seed-4 {
            width: 45px; top: 55%; left: 5%;
            opacity: 0.8;
            animation: floatSeed4 14s ease-in-out infinite 3s;
            transform: rotate(30deg);
        }
        .dandelion-seed-5 {
            width: 60px; top: 40%; left: 22%;
            opacity: 0.9;
            animation: floatSeed1 16s ease-in-out infinite 4s;
            transform: rotate(-15deg);
        }
        .dandelion-seed-6 {
            width: 50px; top: 70%; left: 12%;
            opacity: 0.8;
            animation: floatSeed2 13s ease-in-out infinite 1.5s;
            transform: rotate(45deg);
        }
        .dandelion-seed-7 {
            width: 75px; top: 12%; left: 42%;
            opacity: 0.95;
            animation: floatSeed3 17s ease-in-out infinite 2.5s;
            transform: rotate(-30deg);
        }
        .dandelion-seed-8 {
            width: 40px; top: 60%; left: 32%;
            opacity: 0.75;
            animation: floatSeed4 11s ease-in-out infinite 5s;
            transform: rotate(20deg);
        }
        .dandelion-seed-9 {
            width: 65px; top: 30%; left: 50%;
            opacity: 0.85;
            animation: floatSeed1 19s ease-in-out infinite 3.5s;
            transform: rotate(-50deg);
        }
        .dandelion-seed-10 {
            width: 58px; top: 75%; left: 25%;
            opacity: 0.85;
            animation: floatSeed2 14s ease-in-out infinite 6s;
            transform: rotate(10deg);
        }
        .dandelion-seed-11 {
            width: 72px; top: 5%; left: 55%;
            opacity: 0.85;
            animation: floatSeed3 16s ease-in-out infinite 0.5s;
            transform: rotate(-20deg);
        }
        .dandelion-seed-12 {
            width: 38px; top: 48%; left: 40%;
            opacity: 0.75;
            animation: floatSeed4 12s ease-in-out infinite 4.5s;
            transform: rotate(35deg);
        }
        .dandelion-seed-13 {
            width: 55px; top: 82%; left: 8%;
            opacity: 0.85;
            animation: floatSeed1 15s ease-in-out infinite 7s;
            transform: rotate(-35deg);
        }
        .dandelion-seed-14 {
            width: 46px; top: 20%; left: 65%;
            opacity: 0.8;
            animation: floatSeed2 18s ease-in-out infinite 1s;
            transform: rotate(25deg);
        }
        .dandelion-seed-15 {
            width: 80px; top: 50%; left: 15%;
            opacity: 0.9;
            animation: floatSeed3 13s ease-in-out infinite 5.5s;
            transform: rotate(-45deg);
        }
        .dandelion-seed-16 {
            width: 44px; top: 35%; left: 38%;
            opacity: 0.8;
            animation: floatSeed4 17s ease-in-out infinite 2s;
            transform: rotate(40deg);
        }
        .dandelion-seed-17 {
            width: 62px; top: 65%; left: 45%;
            opacity: 0.85;
            animation: floatSeed1 14s ease-in-out infinite 8s;
            transform: rotate(-10deg);
        }
        .dandelion-seed-18 {
            width: 48px; top: 85%; left: 35%;
            opacity: 0.8;
            animation: floatSeed2 16s ease-in-out infinite 3s;
            transform: rotate(50deg);
        }

        /* Keyframes de flutuação horizontal suave */
        @keyframes floatSeed1 {
            0%, 100% { transform: translateX(0px) translateY(0px) rotate(-25deg); }
            25% { transform: translateX(35px) translateY(-8px) rotate(-15deg); }
            50% { transform: translateX(60px) translateY(5px) rotate(-30deg); }
            75% { transform: translateX(25px) translateY(-3px) rotate(-20deg); }
        }
        @keyframes floatSeed2 {
            0%, 100% { transform: translateX(0px) translateY(0px) rotate(15deg); }
            25% { transform: translateX(-30px) translateY(6px) rotate(25deg); }
            50% { transform: translateX(-55px) translateY(-4px) rotate(10deg); }
            75% { transform: translateX(-20px) translateY(8px) rotate(20deg); }
        }
        @keyframes floatSeed3 {
            0%, 100% { transform: translateX(0px) translateY(0px) rotate(-40deg); }
            20% { transform: translateX(25px) translateY(-10px) rotate(-30deg); }
            40% { transform: translateX(50px) translateY(3px) rotate(-45deg); }
            60% { transform: translateX(35px) translateY(-6px) rotate(-35deg); }
            80% { transform: translateX(15px) translateY(4px) rotate(-42deg); }
        }
        @keyframes floatSeed4 {
            0%, 100% { transform: translateX(0px) translateY(0px) rotate(30deg); }
            30% { transform: translateX(-20px) translateY(-5px) rotate(40deg); }
            60% { transform: translateX(-45px) translateY(7px) rotate(25deg); }
            80% { transform: translateX(-15px) translateY(-3px) rotate(35deg); }
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .francine-quote-section {
                padding: 100px 24px !important;
                min-height: 420px !important;
                justify-content: center !important;
            }
            .francine-quote-text {
                margin-right: 0 !important;
                text-align: center !important;
                max-width: 100% !important;
            }
            .francine-quote-text p {
                text-align: center !important;
                font-size: 1.3rem !important;
            }
            .dandelion-seed {
                transform: scale(0.6);
            }
        }
    </style>

    <section class="project-gallery container pb-5" style="max-width: 1200px; margin: 0 auto;">
        @php
            $galleryImages = array_values(array_slice($project['images'], 1));
            $rows = [];
            $i = 0;
            $count = count($galleryImages);
            $isOneImageRow = true;

            while ($i < $count) {
                if ($isOneImageRow) {
                    $rows[] = [
                        'type' => 'one',
                        'images' => [$galleryImages[$i]]
                    ];
                    $i += 1;
                    $isOneImageRow = false;
                } else {
                    $imgs = [$galleryImages[$i]];
                    if ($i + 1 < $count) {
                        $imgs[] = $galleryImages[$i + 1];
                        $i += 2;
                    } else {
                        $i += 1;
                    }
                    $rows[] = [
                        'type' => 'two',
                        'images' => $imgs
                    ];
                    $isOneImageRow = true;
                }
            }
        @endphp

        @foreach ($rows as $row)
            @if ($row['type'] === 'one')
                <div class="row g-4 mb-4 justify-content-center">
                    <div class="col-12">
                        <img src="{{ asset($row['images'][0]) }}" alt="{{ $project['name'] }} gallery image"
                            class="img-fluid w-100 reveal-zoom" style="border-radius: 8px;">
                    </div>
                </div>
            @else
                <div class="row g-4 mb-4 justify-content-center">
                    @foreach ($row['images'] as $img)
                        <div class="col-md-6 d-flex align-items-stretch">
                            <img src="{{ asset($img) }}" alt="{{ $project['name'] }} gallery image"
                                class="img-fluid w-100 reveal-zoom" style="border-radius: 8px; object-fit: cover;">
                        </div>
                    @endforeach
                </div>
            @endif
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

