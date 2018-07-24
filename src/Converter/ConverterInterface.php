<?php

namespace App\Converter;

use App\Feed\FeedSctructure;

interface ConverterInterface
{
    public function convert(FeedSctructure $structure);
}
