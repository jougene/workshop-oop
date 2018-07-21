<?php

namespace App;

use App\Parser\AtomParser;
use App\Parser\ParserInterface;

class ParserResolver
{
    public static function resolve($params):ParserInterface
    {
        return new AtomParser();
    }
}