#!/usr/bin/env php
<?php

include __DIR__ . '/vendor/autoload.php'; // composer

/*spl_autoload_register(function () {
    echo 'spl_autoload_register' . PHP_EOL;
});*/

$app = new \App\Illuminate\Foundation\Application(__DIR__); // container

$app->singleton(
        \Illuminate\Contracts\Console\Kernel::class,
        \App\Cli\Commands\Kernel::class
); // bind class to interface

/** @var $kernel \App\Illuminate\Foundation\Console\Kernel */
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class); // dependency injection

// register \Illuminate\Console\Events\ArtisanStarting::class event listener
$app['events']->listen(\Illuminate\Console\Events\ArtisanStarting::class, function (\Illuminate\Console\Events\ArtisanStarting $event) {
    echo 'Application name is ' . $event->artisan->getName() . ', and the version is ' . $event->artisan->getVersion() . PHP_EOL;
});

$status = $kernel->handle(
        $input = new \Symfony\Component\Console\Input\ArgvInput(),
        new \Symfony\Component\Console\Output\ConsoleOutput()
);

$kernel->terminate($input, $status);

exit($status);
