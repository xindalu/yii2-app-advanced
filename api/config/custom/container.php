<?php

$container = [
    'definitions' => [
        'api\di\interfaces\UserInterface' => 'api\di\services\UserService',
        'userService' => 'api\di\interfaces\UserInterface',
    ],
];
