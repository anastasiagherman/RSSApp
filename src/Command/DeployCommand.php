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
        ORM::raw_execute("CREATE TABLE IF NOT EXISTS resources(
                            id integer PRIMARY KEY AUTOINCREMENT,
                            name string UNIQUE,
                            url string,
                            created_at current_date);
        " );
        ORM::raw_execute("CREATE TABLE IF NOT EXISTS articles(
                            id integer PRIMARY KEY AUTOINCREMENT,
                            resource_name string NOT NULL,
                            title string NOT NULL,
                            content string,
                            url string NOT NULL,
                            created_at current_date);
        " );

        $output->writeln('<info> Deployed </info>>');
        return Command::SUCCESS;

    }


}