<?php
namespace RSSReader\Command;

use RSSReader\Repository\ArticleRepository;
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
        $this->addArgument("res_name", InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $article = ArticleRepository::readArticleByResource($input->getArgument("res_name"));
        array_map(fn($article)=>$output->writeln($article->getResourceName() . $article->getUrl() . $article->getTitle()), $article);

        return Command::SUCCESS;

    }

}