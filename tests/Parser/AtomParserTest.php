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
        $this->assertEquals('Example Feed', $parsed->jsonSerialize()['title']);
        $this->assertEquals('Insert witty or insightful remark here', $parsed->jsonSerialize()['description']);
        $this->assertEquals('http://example.org/', $parsed->jsonSerialize()['link']);
        $this->assertEquals('2003-12-13 18:30:02', $parsed->jsonSerialize()['updatedAt']);
        $this->assertEquals(['name' => 'John Doe', 'email' => 'johndoe@example.com'], $parsed->jsonSerialize()['author']);

        $this->assertCount(2, $parsed->jsonSerialize()['items']);
    }
}
