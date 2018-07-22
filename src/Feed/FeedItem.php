<?php

namespace App\Feed;

use Carbon\Carbon;

class FeedItem
{
    private $title;
    private $link;
    private $id;
    private $date;
    private $description;

    /**
     * FeedItem constructor.
     * @param $title
     * @param $link
     * @param $id
     * @param $date
     * @param $description
     */
    public function __construct(
        string $title,
        string $link,
        string $id,
        Carbon $date,
        string $description
    ) {
        $this->title = $title;
        $this->link = $link;
        $this->id = $id;
        $this->date = $date;
        $this->description = $description;
    }
}