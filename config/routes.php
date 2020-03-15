<?php
use App\Controller\ResumeController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
    $routes->add('login_check', '/login_check')
    ->methods(['POST']);

    //$routes->import("../Modules/NextCv/Admin/Resource/config/routing.php");
};
