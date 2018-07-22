<?php

use App\Parser\RssParser;

class RssParserTest extends \PHPUnit\Framework\TestCase
{
    public function testParse()
    {
        $rssContent = file_get_contents(__DIR__ . '/../__fixtues__/testrss.rss');

        $parser = new RssParser();

        $parsed = $parser->parse($rssContent);

        $this->assertInstanceOf(\App\Feed\FeedSctructure::class, $parsed);
        $this->assertEquals('Example Feed', $parsed->toArray()['title']);
        $this->assertEquals('Insert witty or insightful remark here', $parsed->toArray()['description']);
        $this->assertInstanceOf(\App\Feed\FeedAuthor::class, $parsed->toArray()['author']);

        $this->assertCount(2, $parsed->toArray()['items']);
    }
}
