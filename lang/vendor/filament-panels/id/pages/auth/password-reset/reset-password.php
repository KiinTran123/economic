<?php

return [

    'title' => 'Atur ulang kata sandi',

    'heading' => 'Atur ulang kata sandi',

    'form' => [

        'email' => [
            'label' => 'Email address',
        ],

        'password' => [
            'label'                => 'Kata sandi baru',
            'validation_attribute' => 'password',
        ],

        'password_confirmation' => [
            'label' => 'Konfirmasi kata sandi baru',
        ],

        'actions' => [

            'reset' => [
                'label' => 'Atur ulang kata sandi',
            ],

        ],

    ],

    'notifications' => [

        'throttled' => [
            'title' => 'Terlalu banyak permintaan. Silakan coba lagi dalam :seconds detik.',
        ],

    ],

];
