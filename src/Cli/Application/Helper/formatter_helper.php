#!/usr/bin/php
<?php

include __DIR__ . '/../../../../vendor/autoload.php';

$formatter_helper = new \Symfony\Component\Console\Helper\FormatterHelper();
$output           = new Symfony\Component\Console\Output\ConsoleOutput();

$section           = $formatter_helper->formatSection('some', 'This account is not valid.');
$block_error       = $formatter_helper->formatBlock('This account is not valid.', 'error', true);
$block_info        = $formatter_helper->formatBlock('This account is not valid.', 'info');
$block_comment     = $formatter_helper->formatBlock('This account is not valid.', 'comment', true);
$truncated_message = $formatter_helper->truncate('This account is not valid.', -6, '!!!');

$output->writeln([$section, $block_error, $block_info, $block_comment, $truncated_message]);
