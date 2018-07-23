<?php

namespace Converter\Transformers;

use App\Feed\FeedSctructure;

interface TransformerInterface
{
    public function transform(FeedSctructure $structure);
}
