<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Aquí puedes configurar tus ajustes para el intercambio de recursos de
    | origen cruzado (CORS). Esto determina qué operaciones se pueden
    | ejecutar en los navegadores web.
    |
    | Más información: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['*'], // Permite todas las rutas

    'allowed_methods' => ['*'], // Permite todos los métodos (GET, POST, PUT, DELETE, etc.)

    'allowed_origins' => ['*'], // Permite todos los orígenes

    'allowed_origins_patterns' => [], // No se restringen patrones de origen

    'allowed_headers' => ['*'], // Permite todos los encabezados

    'exposed_headers' => [], // No expone encabezados adicionales

    'max_age' => 0, // No establece tiempo máximo de caché para preflight

    'supports_credentials' => true, // Permite el envío de credenciales (cookies, headers de autenticación, etc.)

];
