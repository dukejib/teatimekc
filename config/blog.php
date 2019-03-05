<?php


return [

    //Admin of this blog - by developer
    'owners' => [
        'seemegull@gmail.com',
        'asma@gmail.com'
    ],
    'superuser' => [
        'dukejib@gmail.com'
    ],

    'creator' => env('APP_CREATOR','duke'),
    'backend' => 'Admin Panel',
    'email_address' => env('MAIL_FROM_ADDRESS','teatime@karacraft.com'),
    'email_name' => env('MAIL_FROM_NAME','Tea Time'),
];