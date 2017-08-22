#!/usr/bin/php
<?php

include __DIR__ . '/../../../vendor/autoload.php';

use Symfony\Component\Console\Input\InputArgument;

$definition = new \Symfony\Component\Console\Input\InputDefinition(
    [
        new InputArgument('account_number', InputArgument::REQUIRED, 'This is the account number.'),
    ]
);

$input = new \Symfony\Component\Console\Input\ArgvInput(
    null,
    $definition
);

// ./src/Cli/Application/arguments.php lx1036
/** key point: @see \Symfony\Component\Console\Input\ArgvInput::parse() */
var_dump($input->getArguments());
