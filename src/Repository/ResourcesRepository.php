<?php
namespace RSSReader\Repository;
class ResourcesRepository
{
    public static function getResourceByName(string $name)
    {
        return \ORM::for_table("resources")
            ->where("name", $name)
            ->findMany()
            ->as_array();
    }

}