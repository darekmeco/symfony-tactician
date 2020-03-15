<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;

/** @var ContainerBuilder $container */
$container->loadFromExtension('doctrine', [
    'orm' => [
        'mappings' => [
            'Resume' => [
                'is_bundle' => false,
                'type' => 'php',
                'dir' => '%kernel.project_dir%/Modules/NextCv/Resume/doctrine',
                'prefix' => 'NextCv\Modules\Resume\Entity',
                'alias' => 'NextCv',
            ],
            'User' => [
                'is_bundle' => false,
                'type' => 'php',
                'dir' => '%kernel.project_dir%/Modules/NextCv/User/doctrine',
                'prefix' => 'NextCv\Modules\User\Entity',
                'alias' => 'User',
            ]

        ]
    ]
]);
