<?php

namespace Tests\Parser;

use App\Parser\RssParser;
use App\Parser\AtomParser;

class EqualityParsedTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function parsersGetSameResultsForEqualFiles()
    {
        $rssContent = file_get_contents(__DIR__ . '/../__fixtues__/testrss.rss');

        $atomContent = file_get_contents(__DIR__ . '/../__fixtues__/testatom.xml');

        $this->assertEquals(
            (new RssParser())->parse($rssContent),
            (new AtomParser())->parse($atomContent)
        );
    }
}
