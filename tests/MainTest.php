<?php

use App\Main;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    /** @test */
    public function convertFileFromRssToAtom()
    {
        $app = new Main();

        $result = $app->run(
            ['out' => 'rss'],
            ['path' => __DIR__ . '/__fixtues__/testatom.xml']
        );

        $expected = file_get_contents(__DIR__ . '/__fixtues__/testrss.rss');

        $this->assertEquals($expected, $result);
    }

    /** @test */
    public function convertFileFromAtomToRss()
    {
        $app = new Main();

        $result = $app->run(
            ['out' => 'atom'],
            ['path' => __DIR__ . '/__fixtues__/testrss.rss']
        );

        $expected = file_get_contents(__DIR__ . '/__fixtues__/testatom.xml');

        $this->assertEquals($expected, $result);
    }
}
