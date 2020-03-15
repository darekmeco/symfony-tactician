<?php

use NextCv\Modules\User\Controller\UserController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {

    $routes->add('all', '/index')
        ->controller([UserController::class, 'all'])
        ->methods(['GET', 'HEAD']);

    $routes->add('add_friend', '/addFriend')
        ->controller([UserController::class, 'store'])
        ->methods(['POST', 'HEAD']);

};
