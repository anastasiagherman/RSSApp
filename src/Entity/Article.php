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


    public function getResourceName(): string
    {
        return $this->resourceName;
    }


    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTitle(): string
    {
        return $this->title;
    }


    public function getContent(): string
    {
        return $this->content;
    }


    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

}