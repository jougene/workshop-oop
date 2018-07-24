<?php

namespace Tests;

use App\Converter;
use App\Helper;
use PHPUnit\Framework\TestCase;
use PrettyXml\Formatter;

class ConverterTest extends TestCase
{
    public function convertFileFromRssToAtom()
    {
        $app = new Converter();

        $result = $app->run(
            __DIR__ . '/__fixtues__/testatom.xml',
            ['out' => 'rss']
        );

        $string = file_get_contents(__DIR__ . '/__fixtues__/testrss.rss');

        $sanitized = Helper::removeLineBreaks($string);

        $this->assertXmlStringNotEqualsXmlString($sanitized, $result);
    }

    /** @test */
    public function convertFileFromAtomToRss()
    {
        $app = new Converter();

        $result = $app->run(
            __DIR__ . '/__fixtues__/testrss.rss',
            ['out' => 'atom']
        );

        $string = file_get_contents(__DIR__ . '/__fixtues__/testatom.xml');

        $sanitized = Helper::removeLineBreaks($string);

        $this->assertXmlStringNotEqualsXmlString($sanitized, $result);
    }
}
