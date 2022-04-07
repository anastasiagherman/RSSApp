<?php
namespace RSSReader\Command;
use RSSReader\Repository\ResourcesRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class ListResourcesCommand extends Command
{

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'rss:list';

    protected function configure(): void
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        ResourcesRepository::getResourceByName("Test");
        return Command::SUCCESS;


    }
}