<?php

return [
    'app'   =>  [
            'url' => 'http://localhost',
            'hash'  =>  [
                    'algo'  => PASSWORD_BCRYPT,
                    'cost'  =>  10
              ]
      ] ,
      'db' => [
            'driver'  => 'mysql',
            'host'    =>  '127.0.0.1',
            'name'    => 'lunch_test',
            'username' =>   'root',
            'password'  =>  'shivi',
            'charset'   => 'utf8',
            'collation' =>  'utf8_unicode_ci',
            'prefix'    => ''
        ],
        'auth' =>  [
            'session'  =>  'user_id',
            'remember' =>   'user_r'
        ],
        'mail' => [
            'smtp_auth' =>  true,
            'smtp_secure' =>  'tls',
            'host'      =>  'smtp.gmail.com',
            'username'  =>    'ilovetowriteprograms',
            'password'  =>  'sevenpounds',
            'port'      =>   587,
            'html'    =>    true
          ],

        'twig'  =>  [
            'debug'   =>   true
          ],

        'csrf'  =>  [
            'key'  =>   'csrf_token'
          ],

        'category' => [
          'session'    =>  'id'
          ],

          'image' => [
            'path'   =>  '/public/images/'
          ],

          'lang' => [
            'language' => 'lang_country'
            ]

  ];
