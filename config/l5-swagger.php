'api' => [
        /*
        |--------------------------------------------------------------------------
        | Edit to set the api's title
        |--------------------------------------------------------------------------
        */
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \Laravel\Passport\Http\Middleware\CreateFreshApiToken::class,
        'auth',
        'title' => 'Integration Swagger in Laravel with Passport Auth',
    ],

    'security' => [

// Open API 3.0 support
'passport' => [ // Unique name of security
    'type' => 'oauth2', // The type of the security scheme. Valid values are "basic", "apiKey" or "oauth2".
    'description' => 'Laravel passport oauth2 security.',
    'in' => 'header',
    'scheme' => 'https',
    'flows' => [
        "password" => [
            "authorizationUrl" => config('app.url') . '/oauth/authorize',
            "tokenUrl" => config('app.url') . '/oauth/token',
            "refreshUrl" => config('app.url') . '/token/refresh',
            "scopes" => []
        ],
    ],
],
],