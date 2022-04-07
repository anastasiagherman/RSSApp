<?php

namespace RSSReader\Entity;

class Article
{
    public function __construct(
    protected string $url,
    protected string $title,
    protected string $content){

}
}