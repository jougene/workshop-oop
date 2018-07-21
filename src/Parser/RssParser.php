<?php

namespace App\Parser;

use App\Helper;

class RssParser implements ParserInterface
{
    public function parse(string $content): array
    {
        $xml = new \SimpleXMLElement($content);

        return Helper::xml2array($xml);
    }
}