<?php

namespace App\Cli\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Events\Dispatcher;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class LaravelBuildCommand extends Command
{
    protected $signature = 'cli:build_laravel {account_number : Input an account number, required.}
    {--U|user= : Input an user owned the account, required.}
    {--S|spouse= : Input a spouse of the user, optional.}';
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $account = $input->getArgument('account_number');
        $user = $input->getOption('user');
        $spouse = $input->getOption('spouse');
    
        $output->writeln("The account $account belongs to $user" . (empty($spouse) ? '.': " and $spouse."));
    }
    
    public function handle(Dispatcher $dispatcher)
    {
        $account = $this->argument('account_number');
        $user = $this->option('user');
        $spouse = $this->option('spouse');
        
        $this->output->writeln("The account $account belongs to $user" . (empty($spouse) ? '.': " and $spouse."));
        
        // demo for dependency injection
        $dispatcher->dispatch('cli:build_laravel', $this->getLaravel());
    }
}