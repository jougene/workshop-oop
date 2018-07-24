<?php

namespace App;

use App\Reader\FileReader;
use App\Reader\ReaderInterface;

class ReaderResolver
{
    public static function resolve($path): ReaderInterface
    {
        return new FileReader();
    }
}
