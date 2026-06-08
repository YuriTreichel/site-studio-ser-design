<?php

$dir = __DIR__ . '/resources/views';

function processFile($filePath) {
    if (!is_file($filePath)) return;
    
    $content = file_get_contents($filePath);
    $original = $content;
    
    // Replace 'projeto anterior' href
    $content = preg_replace(
        '/<a href="[^"]*"(.*?)>(projeto anterior|PROJETO ANTERIOR)<\/a>/iu',
        '<a href="{{ $project[\'prev_slug\'] ? url(\'/projeto/\' . $project[\'prev_slug\']) : \'#\' }}"$1>$2</a>',
        $content
    );
    
    // Replace 'projeto seguinte' / 'PRÓXIMO PROJETO' href
    $content = preg_replace(
        '/<a href="[^"]*"(.*?)>(projeto seguinte|projeto proximo|próximo projeto|PRÓXIMO PROJETO)<\/a>/iu',
        '<a href="{{ $project[\'next_slug\'] ? url(\'/projeto/\' . $project[\'next_slug\']) : \'#\' }}"$1>$2</a>',
        $content
    );

    // Replace '/projects' with '/projetos' for the 'ver todos' or 'VER TODOS' link
    $content = str_replace("url('/projects')", "url('/projetos')", $content);

    if ($content !== $original) {
        file_put_contents($filePath, $content);
        echo "Updated: " . basename($filePath) . "\n";
    }
}

// process generic project view
processFile($dir . '/project.blade.php');

// process all views in projects directory
$files = glob($dir . '/projects/*.blade.php');
foreach ($files as $file) {
    processFile($file);
}

echo "Done.\n";
