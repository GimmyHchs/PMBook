<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authenticatable Model
    |--------------------------------------------------------------------------
    |
    */

    'models' => [
        'users' => 'App\Auth\User',
        'fakeusers' => 'Hchs\Judge\Permission\FakeUser', // for testing
    ],
];
