<?php
$container->loadFromExtension('framework', [
    'secret' => '%env(APP_SECRET)%',
    'csrf_protection' => false,
    'http_method_override' => false,
    'php_errors' => [
        'log' => true
    ]
]);
