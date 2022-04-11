<?php
namespace RSSReader\Command;

use RSSReader\Repository\ResourcesRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReadResourceCommand extends Command
{

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'rss:read';

    protected function configure(): void
    {
        $this->addArgument("name", InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $repo = new ResourcesRepository();
        $resource = $repo->getResourceByName($input->getArgument("name"));
        if(!$resource){
            $output->writeln("No such resources");
            return Command::SUCCESS;
        }
        dd($resource);

       return Command::SUCCESS;

    }
}