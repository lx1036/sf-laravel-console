#!/usr/bin/env php
<?php

include __DIR__ . '/vendor/autoload.php'; // composer

/*spl_autoload_register(function () {
    echo 'spl_autoload_register' . PHP_EOL;
});*/

$app = new \App\Illuminate\Foundation\Application(__DIR__); // container

$app->singleton(
        \Illuminate\Contracts\Console\Kernel::class,
        \App\Illuminate\Foundation\Console\Kernel::class
); // bind class to interface

/** @var  $kernel \App\Illuminate\Foundation\Console\Kernel */
$kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class); // dependency injection

$status = $kernel->handle(
        $input = new \Symfony\Component\Console\Input\ArgvInput(),
        new \Symfony\Component\Console\Output\ConsoleOutput()
);

$kernel->terminate($input, $status);

exit($status);