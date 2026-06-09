@extends('layouts.app')

@section('title', 'Studio Ser Design')

@section('content')
    <x-header title="Início">
        <div class="header-content reveal">
            <h2 class="text-uppercase montserrat-200" style="letter-spacing: 3px;">Bem-vindo</h2>
            <p class="header-text">
                Studio de branding e design estratégico, unindo conceito, sofisticação e propósito.
            </p>
            <p class="montserrat-300 header-cta" style="font-size: 1.25rem; margin-top: 20px;">
                Explore nossos projetos e serviços no menu.
            </p>
            <button class="text-uppercase montserrat-400 header-link hover-underline bg-transparent border-0 p-0" 
                    type="button" 
                    data-bs-toggle="offcanvas" 
                    data-bs-target="#mainMenuOffcanvas" 
                    aria-controls="mainMenuOffcanvas"
                    style="color: inherit; letter-spacing: 3px; font-size: 25px; margin-top: 20px;">
                Navegar pelo Menu
            </button>
        </div>
    </x-header>

    <x-footer />
@endsection
