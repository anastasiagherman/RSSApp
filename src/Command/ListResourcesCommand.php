<?php
namespace RSSReader\Command;
use RSSReader\Repository\ResourcesRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
class ListResourcesCommand extends Command
{

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'rss:list';

    protected function configure(): void
    {
       // $this->addArgument("name", InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $repo = new ResourcesRepository();
        $output->writeln("<info>Resources:</info>");
        foreach($repo->getResources() as $resource){
            $output->writeln("<info>{$resource->getName()}</info> from {$resource->getUrl()}");
        }
        //ResourcesRepository::getResourceByName($input->getArgument("name"));
        return Command::SUCCESS;

    }
}