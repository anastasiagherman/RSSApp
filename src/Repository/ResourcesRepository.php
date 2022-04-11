<?php
namespace RSSReader\Repository;
use Couchbase\IncrementOptions;
use RSSReader\Entity\Resource;

class ResourcesRepository
{
    public static function getResourceByName(string $name):?Resource
    {
        $resource = \ORM::for_table("resources")
            ->where("name", $name)
            ->findOne();

        if(!$resource){
            return null;
        }
        return Resource::fromArray($resource->asArray());
    }

    public static function getResources():array{
        $resources = \ORM::for_table("resources")
            ->findArray();

       return  array_map(fn(array $resources)=> Resource::fromArray($resources), $resources);
    }

    public static function addRssResource(string $alias, string $url){
        $resource =  \ORM::for_table("resources")->create();
        $resource-> name = $alias;
        $resource-> url = $url;
        $resource->created_at = date("Y-m-d h:i:sa");
        $resource->save();
}

    public static function fetchRssResources(){

    }


}