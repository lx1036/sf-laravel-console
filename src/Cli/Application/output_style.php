#!/usr/bin/env php
<?php

include __DIR__ . '/../../../vendor/autoload.php';

$output = new Symfony\Component\Console\Output\ConsoleOutput();

// comment, info, error, question style
$output->writeln('<comment>This account has been deleted.</comment>');
$output->writeln('<info>This account has been deleted.</info>');
$output->writeln('<error>This account has been deleted.</error>');
$output->writeln('<question>This account has been deleted?</question>');

// custom style
$custom_style = new \Symfony\Component\Console\Formatter\OutputFormatterStyle('red', 'yellow', ['bold']);
$output->getFormatter()->setStyle('custom', $custom_style);

// Symfony\Component\Console\Formatter\OutputFormatter::format() formats a message according to the given styles
$output->writeln('<custom>This is a custom style.</custom>');
