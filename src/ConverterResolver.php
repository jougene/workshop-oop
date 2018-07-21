<?php

namespace App;

use App\Converter\ConverterInterface;

class ConverterResolver
{
    public static function resolve() : ConverterInterface
    {
        return 1;
    }
}