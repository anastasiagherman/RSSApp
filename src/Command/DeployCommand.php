<?php
namespace RSSReader\Command;
use ORM;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeployCommand extends Command
{
    protected static $defaultName = 'rss:deploy';

    protected function configure(): void
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        ORM::row_execute("CREATE TABLE IF NOT EXISTS resources(
                            id int INCREMENT PRIMARY KEY,
                            name string UNIQUE,
                            url string,
                            created_at string NOT NULL);
        " );
        ORM::row_execute("CREATE TABLE IF NOT EXISTS articles(
                            id int INCREMENT PRIMARY KEY,
                            title string NOT NULL,
                            content string,
                            created_at string NOT NULL);
        " );

        $output->writeln('<info> Deployed </info>>');
        return Command::SUCCESS;

    }


}