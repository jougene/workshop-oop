<?php

use App\Converter;
use App\Helper;
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    /** @test */
    public function convertFileFromRssToAtom()
    {
        $app = new Converter();

        $result = $app->run(
            ['out' => 'rss'],
            ['path' => __DIR__ . '/__fixtues__/testatom.xml']
        );

        $string = file_get_contents(__DIR__ . '/__fixtues__/testrss.rss');

        $sanitized = Helper::removeLineBreaks($string);

        $this->assertEquals($sanitized, $result);
    }

    /** @test */
    public function convertFileFromAtomToRss()
    {
        $app = new Converter();

        $result = $app->run(
            ['out' => 'atom'],
            ['path' => __DIR__ . '/__fixtues__/testrss.rss']
        );

        $string = file_get_contents(__DIR__ . '/__fixtues__/testatom.xml');

        $sanitized = Helper::removeLineBreaks($string);

        $this->assertEquals($sanitized, Helper::removeLineBreaks($result));
    }
}
