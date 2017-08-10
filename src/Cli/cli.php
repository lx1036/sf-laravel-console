<?php

// $argv, $argc
var_dump($argv, $argc);

if ($argc === 2 && in_array($argv[1], ['--help', '-help', '-h'])) {
    echo "This script $argv[0] is for studying php cli" . PHP_EOL;
}

