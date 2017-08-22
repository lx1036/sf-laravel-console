#!/usr/bin/php
<?php

include __DIR__ . '/../../../vendor/autoload.php';

use Symfony\Component\Console\Input\InputOption;

$definition = new \Symfony\Component\Console\Input\InputDefinition(
    [
        new InputOption('user', 'U', InputOption::VALUE_REQUIRED, 'The user owned the account.', 'John'),
        new InputOption('spouse', 'S', InputOption::VALUE_OPTIONAL, 'The spouse owned the account.', 'Marry'),
    ]
);

$input = new \Symfony\Component\Console\Input\ArgvInput(
    null,
    $definition
);

// ./src/Cli/Application/options.php --user=lx --spouse=1036
/** key point: @see \Symfony\Component\Console\Input\ArgvInput::parse() */
var_dump($input->getOptions());
