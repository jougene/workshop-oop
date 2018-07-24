<?php

namespace Tests\Parser;

use App\Parser\RssParser;

class RssParserTest extends \PHPUnit\Framework\TestCase
{
    public function testParse()
    {
        $rssContent = file_get_contents(__DIR__ . '/../__fixtues__/testrss.rss');

        $parser = new RssParser();

        $parsed = $parser->parse($rssContent);

        $this->assertInstanceOf(\App\Feed\FeedSctructure::class, $parsed);
        $this->assertEquals('Example Feed', $parsed->jsonSerialize()['title']);
        $this->assertEquals('Insert witty or insightful remark here', $parsed->jsonSerialize()['description']);
        $this->assertEquals(
            ['name' => 'John Doe', 'email' => 'johndoe@example.com'],
            $parsed->jsonSerialize()['author']
        );

        $this->assertCount(2, $parsed->jsonSerialize()['items']);
    }
}
