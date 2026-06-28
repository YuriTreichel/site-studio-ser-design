<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contato', function () {
    return view('contact');
});

Route::get('/projetos', function () {
    $dirs = File::directories(public_path('img/projects'));
    
    $orderedNames = [
        'ATELIER REFÚGIO DA COLINA',
        'TARIH',
        'ALINE CENCI',
        'PISOS & CIA',
        'FRANCINE LONGO',
        'ESTAÇÃO 28',
        'CONFERE QUALITY',
        'DOUGLAS MACARI',
        'IMÓVEIS DA MARCELA'
    ];
    usort($dirs, function($a, $b) use ($orderedNames) {
        $posA = array_search(basename($a), $orderedNames);
        $posB = array_search(basename($b), $orderedNames);
        $posA = $posA !== false ? $posA : 999;
        $posB = $posB !== false ? $posB : 999;
        return $posA <=> $posB;
    });

    $customCovers = [
        'ATELIER REFÚGIO DA COLINA' => 'Free Business Card Among Cactus Mockup.png', // ex: '001-Capa.jpg'
        'TARIH' => 'Simple Paper Notebook Mockup_.png',
        'ALINE CENCI' => 'Free Pillow on Chair Mockup2.png',
        'PISOS & CIA' => '186.png',
        'FRANCINE LONGO' => 'Paper Coffee Cups Mockup.png',
        'ESTAÇÃO 28' => 'Cards with Flower PSD Mockup.png',
        'CONFERE QUALITY' => 'Billboard one the Building Mockup.png',
        'DOUGLAS MACARI' => 'Hard Book Cover Mockup.png',
        'IMÓVEIS DA MARCELA' => 'close-up-people-making-home-comfortable.jpg',
    ];

    $customHovers = [
        'ATELIER REFÚGIO DA COLINA' => null, // ex: '002-Hover.jpg'
        'TARIH' => null,
        'ALINE CENCI' => null,
        'PISOS & CIA' => 'MacBook Air PSD Mockup.png', // Já estava fixado no código
        'FRANCINE LONGO' => null,
        'ESTAÇÃO 28' => null,
        'CONFERE QUALITY' => null,
        'DOUGLAS MACARI' => null,
        'IMÓVEIS DA MARCELA' => null,
    ];

    $projects = [];
    foreach ($dirs as $dir) {
        $name = basename($dir);
        $files = File::files($dir);

        $imageFiles = array_filter($files, function ($file) {
            return in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'svg', 'webp', 'gif']);
        });
        $imageFiles = array_values($imageFiles);

        $customCoverFile = $customCovers[$name] ?? null;
        
        if ($customCoverFile) {
            $cover = 'img/projects/' . $name . '/' . $customCoverFile;
        } else {
            $cover = count($imageFiles) > 0 ? 'img/projects/' . $name . '/' . $imageFiles[0]->getFilename() : 'img/couple.png';
        }
        
        $customHoverFile = $customHovers[$name] ?? null;

        if ($customHoverFile) {
            $hover = 'img/projects/' . $name . '/' . $customHoverFile;
        } else {
            $hoverIndex = count($imageFiles) > 1 ? count($imageFiles) - 1 : 0;
            $hover = count($imageFiles) > 1 ? 'img/projects/' . $name . '/' . $imageFiles[$hoverIndex]->getFilename() : $cover;
        }

        $category = 'Estratégia de Marca, Naming, Identidade Visual';
        if ($name === 'ATELIER REFÚGIO DA COLINA') {
            $category = 'Identidade Visual';
        } elseif ($name === 'CONFERE QUALITY') {
            $category = 'Estratégia, Identidade Visual, Website, Negócio';
        } elseif ($name === 'IMÓVEIS DA MARCELA') {
            $category = 'ESTRATÉGIA DE MARCA';
        } elseif ($name === 'FRANCINE LONGO') {
            $category = 'IDENTIDADE VISUAL';
        }

        $projects[] = [
            'name' => $name,
            'slug' => Str::slug($name),
            'cover' => $cover,
            'hover' => $hover,
            'category' => $category
        ];
    }
    return view('projects', ['projects' => $projects]);
});

Route::get('/projeto/{slug}', function ($slug) {
    if (!File::exists(public_path('img/projects'))) {
        abort(404);
    }

    $dirs = File::directories(public_path('img/projects'));

    $orderedNames = [
        'ATELIER REFÚGIO DA COLINA',
        'TARIH',
        'ALINE CENCI',
        'PISOS & CIA',
        'FRANCINE LONGO',
        'ESTAÇÃO 28',
        'CONFERE QUALITY',
        'DOUGLAS MACARI',
        'IMÓVEIS DA MARCELA'
    ];
    usort($dirs, function($a, $b) use ($orderedNames) {
        $posA = array_search(basename($a), $orderedNames);
        $posB = array_search(basename($b), $orderedNames);
        $posA = $posA !== false ? $posA : 999;
        $posB = $posB !== false ? $posB : 999;
        return $posA <=> $posB;
    });

    $projectDir = null;
    $projectName = '';
    
    $allProjects = [];
    foreach ($dirs as $dir) {
        $allProjects[] = Str::slug(basename($dir));
        if (Str::slug(basename($dir)) === $slug) {
            $projectDir = $dir;
            $projectName = basename($dir);
        }
    }

    if (!$projectDir) abort(404);
    
    $currentIndex = array_search($slug, $allProjects);
    $prevSlug = null;
    $nextSlug = null;
    
    if ($currentIndex !== false) {
        $prevIndex = $currentIndex - 1;
        $nextIndex = $currentIndex + 1;
        
        if ($prevIndex < 0) {
            $prevIndex = count($allProjects) - 1;
        }
        if ($nextIndex >= count($allProjects)) {
            $nextIndex = 0;
        }
        
        $prevSlug = $allProjects[$prevIndex];
        $nextSlug = $allProjects[$nextIndex];
    }

    $files = File::files($projectDir);
    $images = [];
    foreach ($files as $file) {
        if (in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'svg', 'webp', 'gif'])) {
            $images[] = 'img/projects/' . $projectName . '/' . $file->getFilename();
        }
    }

    // Custom order for ATELIER REFÚGIO DA COLINA
    if ($projectName === 'ATELIER REFÚGIO DA COLINA') {
        $images = [
            'img/projects/ATELIER REFÚGIO DA COLINA/00-53.png',
            'img/projects/ATELIER REFÚGIO DA COLINA/Gift Card PSD Mockup.png',
            'img/projects/ATELIER REFÚGIO DA COLINA/017-10.png',
            'img/projects/ATELIER REFÚGIO DA COLINA/Paper Box on Wood Floor Mockup2.png',
        ];
    }

    // Custom order for TARIH
    if ($projectName === 'TARIH') {
        $images = [
            'img/projects/TARIH/002-28.png',
            'img/projects/TARIH/Free MacBook Pro with Doggy on Table Mockup2.png',
            'img/projects/TARIH/Label on Brick Wall Mockup.png',
            'img/projects/TARIH/Simple Paper Notebook Mockup_.png',
            'img/projects/TARIH/Two Posters on Wall Mockup.png',
            'img/projects/TARIH/Notebook Mockup5.png',
            'img/projects/TARIH/Free Outdoor Business Card Mockup2.png',
            'img/projects/TARIH/String Envelope Mockup2.png',
            'img/projects/TARIH/Free Outdoor Business Card Mockup4.png',
            'img/projects/TARIH/Backpack Mockup4.png',
        ];
    }

    // Custom order for CONFERE QUALITY
    if ($projectName === 'CONFERE QUALITY') {
        $images = [
            'img/projects/CONFERE QUALITY/hero.jpg',
            'img/projects/CONFERE QUALITY/00-Construction Helmet Mockup.png',
            'img/projects/CONFERE QUALITY/Hanging ID Card Mockup4.png',
            'img/projects/CONFERE QUALITY/Billboard one the Building Mockup.png',
        ];
    }

    // Custom order for ESTAÇÃO 28
    if ($projectName === 'ESTAÇÃO 28') {
        $images = [
            'img/projects/ESTAÇÃO 28/Tag Mockup.png',
            'img/projects/ESTAÇÃO 28/Cards with Flower PSD Mockup.png',
            'img/projects/ESTAÇÃO 28/000-15.png',
            'img/projects/ESTAÇÃO 28/0-16.png',
        ];
    }

    $category = 'Estratégia, Naming, Marca';
    if ($projectName === 'ATELIER REFÚGIO DA COLINA') {
        $category = 'Identidade Visual';
    } elseif ($projectName === 'CONFERE QUALITY') {
        $category = 'Estratégia, Identidade Visual, Website, Negócio';
    } elseif ($projectName === 'IMÓVEIS DA MARCELA') {
        $category = 'ESTRATÉGIA DE MARCA';
    } elseif ($projectName === 'FRANCINE LONGO') {
        $category = 'IDENTIDADE VISUAL';
    }

    $project = [
        'name' => $projectName,
        'category' => $category,
        'desafio' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diamLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam',
        'solucao' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diamLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam',
        'images' => $images,
        'cover' => count($images) > 0 ? $images[0] : 'img/couple.png',
        'prev_slug' => $prevSlug,
        'next_slug' => $nextSlug
    ];

    $viewName = 'projects.' . $slug;
    if (view()->exists($viewName)) {
        return view($viewName, ['project' => $project]);
    }

    return view('project', ['project' => $project]);
});
