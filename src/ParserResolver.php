<?php

namespace App;

use App\Parser\ParserInterface;
use App\Parser\RssParser;

class ParserResolver
{
    public static function resolve($params):ParserInterface
    {
        return new RssParser();
    }
}