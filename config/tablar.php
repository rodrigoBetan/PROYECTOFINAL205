<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    | Here you can change the default title of your admin panel.
    |
    */

    'title' => 'Tablar',
    'title_prefix' => '',
    'title_postfix' => '',
    'bottom_title' => 'Tablar',
    'current_version' => 'v4.8',


    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    */

    'logo' => '<b>Tab</b>LAR',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can set up an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'assets/tablar-logo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
     *
     * Default path is 'resources/views/vendor/tablar' as null. Set your custom path here If you need.
     */

    'views_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look at the layout section here:
    |
    */

    'layout' => 'combo',
    //boxed, combo, condensed, fluid, fluid-vertical, horizontal, navbar-overlap, navbar-sticky, rtl, vertical, vertical-right, vertical-transparent

    'layout_light_sidebar' => null,
    'layout_light_topbar' => true,
    'layout_enable_top_header' => false,

    /*
    |--------------------------------------------------------------------------
    | Sticky Navbar for Top Nav
    |--------------------------------------------------------------------------
    |
    | Here you can enable/disable the sticky functionality of Top Navigation Bar.
    |
    | For detailed instructions, you can look at the Top Navigation Bar classes here:
    |
    */

    'sticky_top_nav_bar' => false,

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions, you can look at the admin panel classes here:
    |
    */

    'classes_body' => '',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions, you can look at the urls section here:
    |
    */

    'use_route_url' => true,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password.request',
    'password_email_url' => 'password.email',
    'profile_url' => false,
    'setting_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Display Alert
    |--------------------------------------------------------------------------
    |
    | Display Alert Visibility.
    |
    */
    'display_alert' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    |
    */

    'menu' => [
        // Navbar items:
        [
            'text' => 'Home',
            'icon' => 'ti ti-home',
            'url' => '/home'
        ],

        [
            'text' => 'Clientes',
            'url' => '/clients',
            'icon' => 'ti ti-accessible',
            'active' => ['support1'],
            'submenu' => [
                [
                    'text' => 'clients',
                    'url' => '/clients',
                    'icon' => 'ti ti-article',
                    
                ]
                
            ],

            //'can' => 'auth', //esta comando no ve los modulos sin logue 
           // 'can' => 'auth', 
            
        ],


        [
            'text' => 'Productos',
            'url' => '/products',
            'icon' => 'ti ti-box',
            'active' => ['support1'],
            'submenu' => [
                [
                    'text' => 'products',
                    'url' => '/products',
                    'icon' => 'ti ti-article',
                ]
            ],
           //'can' => 'auth',
        ],

        [
            'text' => 'Categorias',
            'url' => '/categoris',
            'icon' => 'ti ti-category',
            'active' => ['support1'],
            'submenu' => [
                [
                    'text' => 'categoris',
                    'url' => '/categoris',
                    'icon' => 'ti ti-category-plus',
                ]
            ],
            //'can' => 'auth',
        ],

        
        [
            'text' => 'Detalle Pedido',
            'url' => '/pedidetalles',
            'icon' => 'ti ti-shopping-cart',
            'active' => ['support1'],
            'submenu' => [
                [
                    'text' => 'Crear pedido',
                    'url' => '/pedidetalles',
                    'icon' => 'ti ti-package',
                ],
                [
                    'text' => 'confirmar pedido',
                    'url' => '/cart/checkout',
                    'icon' => 'ti ti-checklist',
                ]
            ],
           // 'can' => 'auth',
        ],

        [
            'text' => 'Pedidos',
            'url' => '/pedidos',
            'icon' => 'ti ti-shopping-bag-edit',
            'active' => ['support1'],
            'submenu' => [
                [
                    'text' => 'pedidos',
                    'url' => '/pedidos',
                    'icon' => 'ti ti-photo-edit',
                ]
            ],
            //'can' => 'auth',
        ],

        //informes
        [
            'text'   => 'Informe',
            'url'    => '/export', 
            'icon' => 'ti ti-chart-bar',
            'active' => ['pedido.exportForm'],
            'submenu' => [
                [
                    'text' => 'pedidos',
                    'url' => '/pedido/export',

                    'icon' => 'ti ti-report-analytics',
                ]
            ],
            //'can' => 'auth',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    |
    */

    'filters' => [
        TakiElias\Tablar\Menu\Filters\GateFilter::class,
        TakiElias\Tablar\Menu\Filters\HrefFilter::class,
        TakiElias\Tablar\Menu\Filters\SearchFilter::class,
        TakiElias\Tablar\Menu\Filters\ActiveFilter::class,
        TakiElias\Tablar\Menu\Filters\ClassesFilter::class,
        TakiElias\Tablar\Menu\Filters\LangFilter::class,
        TakiElias\Tablar\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Vite
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Vite support.
    |
    | For detailed instructions you can look the Vite here:
    | https://laravel-vite.dev
    |
    */

    'vite' => true,

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://livewire.laravel.com
    |
    */

    'livewire' => false,
];
