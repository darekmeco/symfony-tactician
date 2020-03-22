<?php

use NextCv\Modules\User\Controller\UserCommandController;
use NextCv\Modules\User\Controller\UserQueryController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {

    $routes->add('all', '/index')
        ->controller([UserCommandController::class, 'all'])
        ->methods(['GET', 'HEAD']);

    $routes->add('all', '/index')
        ->controller([UserQueryController::class, 'all'])
        ->methods(['GET', 'HEAD']);

    $routes->add('sync_friends', '/sync-friends')
        ->controller([UserCommandController::class, 'syncFriends'])
        ->methods(['POST', 'HEAD']);

    $routes->add('add_friends', '/add-friends')
        ->controller([UserCommandController::class, 'addFriends'])
        ->methods(['POST', 'HEAD']);

};
