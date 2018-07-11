<?php

$container = [
    'definitions' => [
        'api\di\interfaces\UserInterface' => 'api\di\services\UserService',
        'mainUserService' => 'api\di\interfaces\UserInterface',

        'api\di\interfaces\UserMenuInterface' => 'api\di\services\UserMenuService',
        'concreteUserMenuService' => 'api\di\interfaces\UserMenuInterface',
    ],
];
