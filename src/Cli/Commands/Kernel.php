<?php

declare(strict_types=1);

namespace App\Cli\Commands;

class Kernel extends \App\Illuminate\Foundation\Console\Kernel
{
    protected $commands = [
        LaravelBuildCommand::class,
        SymfonyBuildCommand::class,
        TableCommand::class,
    ];
}
