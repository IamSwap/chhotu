<?php

// Global Functions

// Renders views from /app/views directory
function view($file, $data) 
{    
    $pathToTemplates = [__DIR__ . '/app/views'];
    $pathToCompiledTemplates = __DIR__ . '/cache/views';

    $fileSystem = new \Illuminate\Filesystem\Filesystem;
    $events = new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container);

    $viewResolver = new \Illuminate\View\Engines\EngineResolver;
    $bladeCompiler = new \Illuminate\View\Compilers\BladeCompiler($fileSystem, $pathToCompiledTemplates);

    $viewResolver->register('blade', function() use ($bladeCompiler, $fileSystem) {
        return new \Illuminate\View\Engines\CompilerEngine($bladeCompiler, $fileSystem);
    });

    $viewResolver->register('php', function() {
        return new \Illuminate\View\Engines\PhpEngine;
    });

    $viewFinder = new \Illuminate\View\FileViewFinder($fileSystem, $pathToTemplates);
    $viewFactory = new Illuminate\View\Factory($viewResolver, $viewFinder, $events);

    echo $viewFactory->make($file, $data)->render();
}
