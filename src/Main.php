<?php

namespace App;

class Main
{
    public function run($params)
    {
        $reader = ReaderResolver::resolve($params);

        $converter = ConverterResolver::resolve($params);

        $parser = ParserResolver::resolve($params);

        $path = __DIR__ . '/../testrss.rss';

        $fileContent = $reader->read($path);

        $parsed = $parser->parse($fileContent);

        return $converter->convert($parsed);
    }
}