<?php

return [

    'title' => 'دخول',

    'heading' => 'الدخول إلى حسابك',

    'actions' => [

        'register' => [
            'before' => 'أو',
            'label'  => 'إنشاء حساب',
        ],

        'request_password_reset' => [
            'label' => 'نسيت كلمة المرور؟',
        ],

    ],

    'form' => [

        'email' => [
            'label' => 'البريد الإلكتروني',
        ],

        'password' => [
            'label' => 'كلمة المرور',
        ],

        'remember' => [
            'label' => 'تذكرني',
        ],

        'actions' => [

            'authenticate' => [
                'label' => 'تسجيل الدخول',
            ],

        ],

    ],

    'messages' => [

        'failed' => 'خطأ في إدخال المعرف الخاص بك أو كلمة المرور',

    ],

    'notifications' => [

        'throttled' => [
            'title' => 'لقد قمت بمحاولات تسجيل دخول كثيرة جدًا',
            'body'  => 'يرجى المحاولة مرة أخرى بعد :seconds ثواني.',
        ],

    ],

];
