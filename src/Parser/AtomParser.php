<?php

namespace App\Parser;

use Carbon\Carbon;
use App\Feed\FeedAuthor;
use App\Feed\FeedSctructure;

class AtomParser implements ParserInterface
{
    public function parse(string $content): FeedSctructure
    {

    }

    private function fillItems($items) : array
    {
        return [];
    }
}