#!/usr/bin/php
<?php

include __DIR__ . '/../../../../vendor/autoload.php';

$output = new Symfony\Component\Console\Output\ConsoleOutput();
$table  = new \Symfony\Component\Console\Helper\Table($output);

// ./src/Cli/Application/Helper/table_helper.php
$table->setHeaders(['account', 'user', 'number'])->setRows([
    ['Bank', 'John', 'B123'],
    ['Loan', 'John', 'L123'],
    ['Credit Card', 'John', 'C123'],
    ['Investment', 'John', 'I123'],
])->render();
