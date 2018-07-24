<?php

namespace App\Converter;

use App\Feed\FeedSctructure;

class RssConverter implements ConverterInterface
{
    public function convert(FeedSctructure $structure)
    {
        return 'rss xml';
    }
}
