<?php

namespace RSSReader\Command;

use RSSReader\Repository\ArticleRepository;
use RSSReader\Repository\ResourcesRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReadArticlesByResourcesCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'rss:readArticle';

    protected function configure(): void
    {
        $this->addArgument("res_name", InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
       dd(ArticleRepository::readArticleByResource($input->getArgument("res_name")));

        return Command::SUCCESS;

    }

}