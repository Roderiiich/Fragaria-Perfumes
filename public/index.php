<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// --- DETECTOR DE ENMASCARAMIENTO ---
set_exception_handler(function ($e) {
    echo "<h1>¡CAZADO! El error real ocurre aquí:</h1>";
    echo "<p><strong>Mensaje:</strong> " . $e->getMessage() . "</p>";
    echo "<p><strong>Archivo original donde falló:</strong> " . $e->getFile() . " (Línea " . $e->getLine() . ")</p>";
    echo "<h2>Historial de llamadas (Trace):</h2>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
    exit();
});
// ------------------------------------

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());