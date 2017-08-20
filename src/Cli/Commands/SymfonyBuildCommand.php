<?php

namespace App\Cli\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class SymfonyBuildCommand extends Command
{
    protected function configure()
    {
        $this->setName('cli:build_symfony')
            ->addArgument('account_number', InputArgument::REQUIRED, 'Input an account number, required.')
            ->addOption('user', '-U', InputOption::VALUE_REQUIRED, 'Input an user owned the account, required.')
            ->addOption('spouse', '-S', InputOption::VALUE_OPTIONAL, 'Input a spouse of the user, optional.')
            ->setDescription('This command build a household account');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $account = $input->getArgument('account_number');
        $user = $input->getOption('user');
        $spouse = $input->getOption('spouse');
        
        $output->writeln("The account $account belongs to $user" . (empty($spouse) ? '.': " and $spouse."));
    }
}