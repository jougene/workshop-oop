<?php

namespace App\Feed;

use Carbon\Carbon;

class FeedSctructure
{
    private $title;
    private $description;
    private $link;
    private $updatedAt;
    private $author = [];

    /** @var FeedItem[] */
    private $items;

    public function __construct(
        string $title,
        string $description,
        string $link,
        Carbon $updatedAt,
        FeedAuthor $author,
        array $items
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->updatedAt = $updatedAt;
        $this->author = $author;
        $this->items = $items;
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'link' => $this->link,
            'updatedAt' => $this->updatedAt,
            'author' => $this->author,
            'items' => $this->items,
        ];
    }
}