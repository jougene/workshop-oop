<?php

namespace App;

use App\Reader\ReaderInterface;

class Main
{
    /** @var ReaderInterface */
    private $reader;

    public function __construct(ReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function run(array $opts)
    {
        $parser = new ArgsParser();

        $params = $parser->parse($opts);

        $reader = ReaderResolver::resolve($params);

        $fileContent = $this->reader->read();
    }
}