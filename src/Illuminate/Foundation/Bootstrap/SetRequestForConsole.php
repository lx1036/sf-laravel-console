<?php

declare(strict_types=1);

namespace App\Illuminate\Foundation\Bootstrap;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class SetRequestForConsole
{
    /**
     * Bootstrap the given application.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function bootstrap(Application $app)
    {
        $app->instance('request', Request::create(
            $app->make('config')->get('app.url', 'http://localhost'), 'GET', [], [], [], $_SERVER
        ));
    }
}
