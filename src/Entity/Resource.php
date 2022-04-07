<?php
namespace RSSReader\Entity;
class Resource
{
    public function __construct(
        protected string $url,
        protected string $title,
        protected string $content)
    {

    }
}