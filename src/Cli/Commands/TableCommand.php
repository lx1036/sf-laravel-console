<?php

declare(strict_types=1);

namespace App\Cli\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TableCommand extends Command
{
    protected function configure()
    {
        $this->setName('cli:table')
        ->addArgument('name', InputArgument::REQUIRED)
        ->addOption('height', '-H', InputArgument::OPTIONAL)
        ->addOption('width', '-W', InputArgument::OPTIONAL);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        //        $arguments = $input->getArguments();
        $height = $input->getOption('height');
        $width  = $input->getOption('width');
        //        $options = $input->getOptions();
        $output->setDecorated(true);
        $output->writeln("Table $name whose height is $height and width is $width");
    }
}
