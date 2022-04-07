<?php
namespace RSSReader\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReadResourceCommand extends Command
{

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'rss:read';

    protected function configure(): void
    {
        $this->addArgument("name");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

       return Command::SUCCESS;

    }
}