#!/usr/bin/php
<?php

include __DIR__ . '/../../../vendor/autoload.php';

$app = new \Symfony\Component\Console\Application('laravel', 'v1.0');

$dispatcher = new \Symfony\Component\EventDispatcher\EventDispatcher();

$app->setDispatcher($dispatcher);

// add a 'console.command' event before running command
$dispatcher->addListener(\Symfony\Component\Console\ConsoleEvents::COMMAND, function (\Symfony\Component\Console\Event\ConsoleCommandEvent $event) {
    $input = $event->getInput();
    $output = $event->getOutput();

    foreach ($input->getArguments() as $argument) {
        $output->writeln("The argument is $argument.");
    }
});

// add a 'console.error' event when running command throw exception
$dispatcher->addListener(\Symfony\Component\Console\ConsoleEvents::ERROR, function (\Symfony\Component\Console\Event\ConsoleErrorEvent $event) {
    $exit_code = $event->getExitCode();

    $event->setError(new \Symfony\Component\Console\Exception\LogicException('Caught exception', $exit_code));
});

// add a 'console.terminate' event after running command
$dispatcher->addListener(\Symfony\Component\Console\ConsoleEvents::TERMINATE, function (\Symfony\Component\Console\Event\ConsoleTerminateEvent $event) {
    $output = $event->getOutput();
    $command_name = $event->getCommand()->getName();

    $output->writeln("Command $command_name is terminated.");
});

$app->add(new \App\Cli\Commands\TableCommand());

$app->run();
