<?php
namespace RSSReader\Command;
use RSSReader\Repository\ArticleRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FetchResourcesCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'rss:fetch';

    protected function configure(): void
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        ArticleRepository::saveArticles();
        $output->writeln("<info> Items were saved</info>");
        return Command::SUCCESS;

    }

}