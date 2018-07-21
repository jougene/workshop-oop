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
            [__DIR__ . '/__fixtues__/testatom.xml']
        );

        $expected = file_get_contents(__DIR__ . '/__fixtues__/testrss.xml');

        $this->assertEquals($expected, $result);
    }
}
