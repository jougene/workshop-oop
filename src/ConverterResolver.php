<?php

namespace App;

use App\Converter\AtomConverter;
use App\Converter\ConverterInterface;
use App\Converter\RssConverter;

class ConverterResolver
{
    private static $converters = [
        'rss' => RssConverter::class,
        'atom' => AtomConverter::class
    ];

    public static function resolve($params) : ConverterInterface
    {
        $className = self::$converters[$params['out']];

        return new $className();
    }
}

