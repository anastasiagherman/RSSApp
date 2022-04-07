<?php


require __DIR__."/vendor/autoload.php";

ORM::configure('sqlite:./storage/rss.db');


use RSSReader\Command\AddResourceCommand;
use RSSReader\Command\DeployCommand;
use RSSReader\Command\FetchResourcesCommand;
use RSSReader\Command\ListResourcesCommand;
use RSSReader\Command\ReadResourceCommand;
use Symfony\Component\Console\Application;
$application = new Application();

$application->add(new DeployCommand());
$application->add(new AddResourceCommand());
$application->add(new ListResourcesCommand());
$application->add(new ReadResourceCommand());
$application->add(new FetchResourcesCommand());
$application->run();