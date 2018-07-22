<?php

namespace App;

class Main
{
    public function run($opts, $args)
    {
        $reader = ReaderResolver::resolve($args);

        $converter = ConverterResolver::resolve($opts);

        $parser = ParserResolver::resolve($args);

        $path = $args['path'];

        $fileContent = $reader->read($path);

        $parsed = $parser->parse($fileContent);

        return $converter->convert($parsed);
    }
}