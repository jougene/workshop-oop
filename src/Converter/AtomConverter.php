<?php

namespace App\Converter;

use App\Feed\FeedSctructure;

class AtomConverter implements ConverterInterface
{
    public function convert(FeedSctructure $structure)
    {
        // fill
        return 'atom xml';
    }
}