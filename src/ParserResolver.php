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

    public static function resolve($params):ParserInterface
    {
        $filePath = $params['path'];

        // resolve which file type we have - by content or by file info
        $extention = (new \SplFileObject($filePath))->getExtension();

        $className = self::$extParsersMap[$extention];

        return new $className();
    }
}