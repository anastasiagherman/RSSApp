<?php
namespace RSSReader\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddResourceCommand extends Command
{

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'rss:add';

    protected function configure(): void
    {
        $this->addArgument("alias", InputArgument::REQUIRED);
        $this->addArgument("url", InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {


        return Command::SUCCESS;

    }

}