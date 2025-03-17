<?php

return [

    'title' => 'Сбросить пароль',

    'heading' => 'Забыли свой пароль?',

    'actions' => [

        'login' => [
            'label' => 'назад на страницу входа',
        ],

    ],

    'form' => [

        'email' => [
            'label' => 'Адрес электронной почты',
        ],

        'actions' => [

            'request' => [
                'label' => 'Отправить письмо',
            ],

        ],

    ],

    'notifications' => [

        'throttled' => [
            'title' => 'Слишком много попыток',
            'body'  => 'Пожалуйста, попробуйте еще раз через :seconds секунд.',
        ],

    ],

];
