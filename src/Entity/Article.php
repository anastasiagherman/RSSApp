<?php

namespace RSSReader\Entity;

class Article
{
    public function __construct(
    protected string $resourceName,
    protected string $url,
    protected string $title,
    protected string $content,
    protected ?string $createdAt){

}
    public static function fromArray(array $data):Article
    {
        return new Article(
            $data["resource_name"],
            $data["url"],
            $data["title"],
            $data["content"],
            $data["created_at"]
        );
    }
}