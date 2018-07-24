<?php

namespace App\Feed;

use Carbon\Carbon;

class FeedSctructure implements \JsonSerializable
{
    private $title;
    private $description;
    private $link;
    private $updatedAt;
    private $author;

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

    /**
     * @return FeedAuthor
     */
    public function getAuthor(): FeedAuthor
    {
        return $this->author;
    }

    public function jsonSerialize()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'link' => $this->link,
            'updatedAt' => $this->updatedAt->toDateTimeString(),
            'author' => $this->author->jsonSerialize(),
            'items' => $this->items,
        ];
    }
}
