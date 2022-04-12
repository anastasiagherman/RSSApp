<?php

namespace RSSReader\Repository;

use RSSReader\Entity\Article;
use RSSReader\Entity\Resource;

class ArticleRepository
{
    public static function readArticleByResource(string $name){
        $article = \ORM::for_table("articles")
            ->where("resource_name", $name)
            ->findMany();
        $articleArray=array_map(fn($article)=>Article::fromArray($article->asArray()),$article);

        if(!$article){
            return null;
        }
        return $articleArray;
        }


    public static function saveArticles()
    {
        $repo = new ResourcesRepository();
        $rssResources = $repo->getResources();
        $art = new ArticleRepository();
        $articles = $art->getArticles();
        foreach ($rssResources as $resource) {
            print "articles {$resource->getName()}" . PHP_EOL;
            $feed = simplexml_load_file($resource->getUrl());
            foreach ($feed->channel->item as $item) {
                $result = array_search($item->link, array_column($articles,"url"));
                if (!$result){
                    $article = \ORM::for_table("articles")->create();
                    $article->resource_name = $resource->getName();
                    $article->url = (string)$item->link;
                    $article->title = (string)$item->title;
                    $article->content = (string)$item->description;
                    $article->created_at = date("Y-m-d h:i:sa");
                    $article->save();
                }
            }
        }
    }
    public static function getArticles():array{
        $articles = \ORM::for_table("articles")
            ->findArray();

        return  array_map(fn(array $articles)=> Article::fromArray($articles), $articles);
    }
}