#!/usr/bin/php
<?php

include __DIR__ . '/../../../vendor/autoload.php';

$app = new \Symfony\Component\Console\Application('laravel', 'v1.0');

$app->add(new \App\Cli\Commands\TableCommand());

$app->run();
