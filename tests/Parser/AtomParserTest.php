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
        $this->assertEquals('Example Feed', $parsed->toArray()['title']);
        $this->assertEquals('Insert witty or insightful remark here', $parsed->toArray()['description']);
        $this->assertInstanceOf(\App\Feed\FeedAuthor::class, $parsed->toArray()['author']);

        $this->assertCount(2, $parsed->toArray()['items']);
    }
}
