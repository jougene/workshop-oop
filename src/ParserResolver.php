<?php

namespace App;

use App\Parser\AtomParser;
use App\Parser\ParserInterface;
use App\Parser\RssParser;

class ParserResolver
{
    private static $extParsersMap = [
        'xml' => AtomParser::class,
        'rss' => RssParser::class
    ];

    public static function resolve($path):ParserInterface
    {
        // resolve which file type we have
        // - by content
        // - by by file info
        $extention = (new \SplFileObject($path))->getExtension();

        $className = self::$extParsersMap[$extention];

        return new $className();
    }
}

