<?php
namespace RSSReader\Entity;
class Resource
{
    public function __construct(
        protected string $name,
        protected string $url,
        protected string $createdAt)
    {

    }
    public static function fromArray(array $data)
    {
        return new Resource(
            $data["name"],
            $data["url"],
            $data["created_at"]
        );
    }


    public function getUrl(): string
    {
        return $this->url;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }


}