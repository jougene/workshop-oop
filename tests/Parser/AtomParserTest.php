<?php

use App\Parser\AtomParser;
use PHPUnit\Framework\TestCase;

class AtomParserTest extends TestCase
{
    public function testParse()
    {
        $atomContent = file_get_contents(__DIR__ . '/../__fixtues__/testatom.xml');

        $parser = new AtomParser();

        $parsed = $parser->parse($atomContent);

        $this->assertInstanceOf(\App\Feed\FeedSctructure::class, $parsed);
    }
}
