<?php

namespace App;

class Converter
{
    public function run($path, $opts)
    {
        $reader = ReaderResolver::resolve($path);

        $converter = ConverterResolver::resolve($opts);

        $parser = ParserResolver::resolve($path);

        $fileContent = $reader->read($path);

        $parsed = $parser->parse($fileContent);

        return $converter->convert($parsed);
    }
}