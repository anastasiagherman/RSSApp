<?php

namespace RSSReader\Repository;

use RSSReader\Entity\Article;

class ArticleRepository
{
    public static function readArticleByResource(string $name){
        $article = \ORM::for_table("articles")
            ->where("resource_name", $name)
            ->findOne();

        if(!$article){
            return null;
        }
        return Article::fromArray($article->asArray());
        }

    public static function getArticles(){

    }

    public static function uploadRSS()
    {
        $repo = new ResourcesRepository();
        $rssResources = $repo->getResources();

        foreach ($rssResources as $resource) {
            print "articles:". PHP_EOL;
            $feed = simplexml_load_file($resource->getUrl());
            foreach ($feed->channel->item as $item) {
                $article = \ORM::for_table("articles")->create();
                $article->resource_name = $resource->getName();
                $article->url = (string)$item->link;
                $article->title = (string)$item->title;
                $article->content = (string)$item->description;
                $item->created_at = date("Y-m-d h:i:sa");
                $article->save();
            }
        }
        if(!$rssResources){
            print "There are not rss resources" . PHP_EOL;
        }
    }

}