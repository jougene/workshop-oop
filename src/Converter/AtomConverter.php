<?php

namespace App\Converter;

class AtomConverter implements ConverterInterface
{
    public function convert(array $content)
    {
        return 'atom xml';
    }
}