<?php

// Boot Laravel
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

// Force APP_URL to http://localhost so we have a consistent base for relative path replacement
config(['app.url' => 'http://localhost']);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

$outputDir = __DIR__ . '/docs';

// 1. Clean/Create the docs directory
if (File::exists($outputDir)) {
    File::deleteDirectory($outputDir);
}
File::makeDirectory($outputDir);

// 2. Identify all routes/pages to export
$routes = [
    '/' => 'index.html',
    '/contato' => 'contato/index.html',
    '/projetos' => 'projetos/index.html',
];

// Dynamically add project slug routes
$projectDirsPath = public_path('img/projects');
if (File::exists($projectDirsPath)) {
    $dirs = File::directories($projectDirsPath);
    foreach ($dirs as $dir) {
        $slug = Str::slug(basename($dir));
        $routes['/projeto/' . $slug] = 'projeto/' . $slug . '/index.html';
    }
}

echo "Starting export of Laravel routes to static files in docs/...\n";

// 3. Export each page
foreach ($routes as $uri => $relativePath) {
    echo "Exporting: {$uri} -> {$relativePath}\n";
    
    // Create the request
    $request = Request::create($uri, 'GET');
    $response = $kernel->handle($request);
    $html = $response->getContent();
    
    // Determine the depth of this file to compute the relative prefix
    // e.g., 'index.html' -> depth 0 -> prefix is ''
    // e.g., 'contato/index.html' -> depth 1 -> prefix is '..'
    // e.g., 'projeto/tarih/index.html' -> depth 2 -> prefix is '../..'
    $cleanPath = ltrim(str_replace('\\', '/', $relativePath), '/');
    $parts = explode('/', $cleanPath);
    array_pop($parts); // Remove the filename (index.html)
    $depth = count($parts);
    $prefix = $depth > 0 ? implode('/', array_fill(0, $depth, '..')) : '.';

    // Rewrite absolute localhost URLs to relative URLs
    // We match http://localhost/ with or without subsequent path characters
    $html = preg_replace_callback(
        '/http:\/\/localhost(\/[^"\')\s]*)?/',
        function($matches) use ($prefix) {
            $path = $matches[1] ?? '';
            // If it's just http://localhost or http://localhost/
            if ($path === '' || $path === '/') {
                return $prefix . '/index.html';
            }
            
            // Normalize path (remove leading slash)
            $trimmedPath = ltrim($path, '/');
            
            // Check if this path corresponds to one of our HTML routes
            $routeKey = '/' . $trimmedPath;
            
            // Handle cases with trailing slash or query parameters
            $routeKeyClean = rtrim(explode('?', $routeKey)[0], '/');
            
            // We need to check routes map
            // e.g. /contato maps to contato/index.html
            // Or if it's an asset (css, js, img, build, etc.) we just keep it as prefix/trimmedPath
            $staticRoutes = [
                '/' => 'index.html',
                '/contato' => 'contato/index.html',
                '/projetos' => 'projetos/index.html',
            ];
            
            // Check projects slugs
            $projectDirsPath = public_path('img/projects');
            if (File::exists($projectDirsPath)) {
                $dirs = File::directories($projectDirsPath);
                foreach ($dirs as $d) {
                    $slug = Str::slug(basename($d));
                    $staticRoutes['/projeto/' . $slug] = 'projeto/' . $slug . '/index.html';
                }
            }
            
            if (isset($staticRoutes[$routeKeyClean])) {
                return $prefix . '/' . $staticRoutes[$routeKeyClean];
            }
            
            // Otherwise, it's an asset (like css/style.css, img/logo.png, etc.)
            return $prefix . '/' . $trimmedPath;
        },
        $html
    );

    // Save the processed HTML file
    $targetFile = $outputDir . '/' . $relativePath;
    $targetDir = dirname($targetFile);
    if (!File::exists($targetDir)) {
        File::makeDirectory($targetDir, 0755, true);
    }
    
    File::put($targetFile, $html);
}

// 4. Copy public assets to docs/
echo "Copying public assets to docs/...\n";
$publicPath = public_path();
$filesAndDirs = File::allFiles($publicPath);

// Create gitignore if needed, but we want docs/ to be committed for GitHub Pages.
// Let's copy the files:
foreach ($filesAndDirs as $file) {
    $relativeFilePath = $file->getRelativePathname();
    
    // Exclude php files and server configs
    if ($relativeFilePath === 'index.php' || $relativeFilePath === '.htaccess' || Str::endsWith($relativeFilePath, '.php')) {
        continue;
    }
    
    $destFile = $outputDir . '/' . $relativeFilePath;
    $destDir = dirname($destFile);
    
    if (!File::exists($destDir)) {
        File::makeDirectory($destDir, 0755, true);
    }
    
    File::copy($file->getRealPath(), $destFile);
}

// 5. Create a .nojekyll file in docs/ to make sure GitHub Pages doesn't ignore directories starting with underscores (like Vite's build directories or standard assets)
File::put($outputDir . '/.nojekyll', '');

echo "Export completed successfully! Static site is ready in docs/.\n";
