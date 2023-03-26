<?php

return [

    # cockpit session name
    'app.name' => 'MEG ensemble',

    /* # cockpit session name
    'session.name' => 'mysession',

    # app custom security key
    'sec-key' => 'xxxxx-SiteSecKeyPleaseChangeMe-xxxxx',

    # site url (optional) - helpful if you're behind a reverse proxy
    'site_url' => 'https://mydomain.com', 
    
    # define the languages you want to manage */
    'languages' => [
        'default' => 'Français',       #setting a default language is optional
        'en' => 'English'
    ], 

    # define additional groups 
    'groups' => [
        'editor' => [
            'comments' => [ 'view' => true, 'add' => true, 'delete' => true ],
            '$admin' => false,
            '$vars' => [
                'finder.path' => '/storage/uploads'
            ],
            'cockpit' => [
                'backend' => true,
                'finder' => true,
                'unlockresources' => true
            ]
        ],
        'author' => [
            'comments' => [ 'view' => true, 'add' => true, 'delete' => true ],
            '$admin' => false,
            '$vars' => [
                'finder.path' => '/storage/uploads'
            ],
            'cockpit' => [
                'backend' => true,
                'finder' => true,
                'unlockresources' => true
            ],
            'collections' => [
                'manage' => true,
            ],
            'singeltons' => [
                'manage' => false
            ]
        ]
    ],
    'helpers'  => [
        'environment' => 'local'
    ],
    'comments' => [
        'collections' => ['inventory'],
    ],
    'imageresize' => [
        'resize'       => true,        # (bool) default: true

        # create a copy of uploaded files in `/original/img.jpg`
        'keepOriginal' => true,         # (bool) default: true
        'moveOriginalTo' => 'full', # (string) default: full

        # resize options, that are passed to SimpleImage library
        # If you set maxWidth or maxHeight to 0 (zero), the value will be ignored.
        'maxWidth'     => 3000,         # (int) default: 1920
        'maxHeight'    => 0,            # (int) default: 0
        'method'       => 'bestFit',    # (string) default: bestFit
        'quality'      => 100,          # (int) default: 100

        # remove uniqid from file names, duplicates will have increasing number suffixes
        'prettyNames'  => false,         # (bool) default: false

        # overwrite original date pattern - `/2020/10/30/img.jpg` --> `/images/img.jpg`
        'customFolder' => '/images',    # (string|null) default: null

        # Spatie image optimizer (requires additional binaries)
        'optimize'     => false,         # (bool) default: false

        # use modified assets manager
        'replaceAssetsManager' => true, # (bool) default: false

        # add multiple sizes like thumbnail
        'profiles' => [
            'small' => [                # --> `/small/img.jpg`
                'width'   => 1024,
                'height'  => 0,
                'method'  => 'bestFit', # (string) default: thumbnail
                'quality' => 70,        # (int) default: 100
            ],
            'thumbs' => [               # --> `/thumbs/img.jpg`
                'width'   => 200,
                'height'  => 200,
                'method'  => 'thumbnail',
                'quality' => 70,
            ],
            'headerimage' => [
                'width'   => 1200,
                'height'  => 400,
                'method'  => 'thumbnail',
                'quality' => 70,
                # set custom folder, that doesn't match profile name --> `/header/img.jpg`
                'folder'  => 'header'   # (string) if omited, the key name 'headerimage' is used
            ],
        ],
    ],

    /*# use mongodb as main data storage
    'database' => [   
        'server' => 'mongodb://localhost:27017',
        'options' => [
            'db' => 'cockpitdb'
        ]
    ],

     # use smtp to send emails
    'mailer' => [
        'from'       => 'info@mydomain.tld',
        'transport'  => 'smtp'
        'host'       => 'smtp.myhost.tld',
        'user'       => 'username'
        'password'   => 'xxpasswordxx',
        'port'       => 25,
        'auth'       => true,
        'encryption' => '' # '', 'ssl' or 'tls'
    ]

    # Define Access-Control (CORS) settings.
    # Those are the default values. You don't need to duplicate them all.
    'cors' => [
      'allowedHeaders' => 'X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding, Cockpit-Token',
      'allowedMethods' => 'PUT, POST, GET, OPTIONS, DELETE',
      'allowedOrigins' => '*',
      'maxAge' => '1000',
      'allowCredentials' => 'true',
      'exposedHeaders' => 'true',
    ], */
];
