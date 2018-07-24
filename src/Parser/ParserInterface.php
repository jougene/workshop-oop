<?php

namespace App\Parser;

use App\Feed\FeedSctructure;

interface ParserInterface
{
    public function parse(string $content):FeedSctructure;
}
