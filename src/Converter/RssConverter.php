<?php

namespace App\Converter;

class RssConverter implements ConverterInterface
{
    public function convert(array $content)
    {
        return 'rss xml';
    }
}