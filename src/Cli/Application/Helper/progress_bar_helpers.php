#!/usr/bin/php
<?php

include __DIR__ . '/../../../../vendor/autoload.php';

$output   = new Symfony\Component\Console\Output\ConsoleOutput();
$progress = new \Symfony\Component\Console\Helper\ProgressBar($output);

$accounts = ['John', 'Marry', 'Jack', 'Leo'];

$progress->setFormat('normal');

$progress->start(count($accounts));

foreach ($accounts as $account) {
    // account logic...
    sleep(1);

    $progress->advance();
}

// ./src/Cli/Application/Helper/progress_bar_helpers.php
$progress->finish();
