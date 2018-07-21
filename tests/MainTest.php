<?php

use App\Main;
use App\Reader\FileReader;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    /** @test */
    public function convert_file_from_rss_to_atom()
    {
        $app = new Main();

        $result = $app->run(
            new \Garden\Cli\Args('test', ['out' => 'rss'], ['testrss.rss'])
        );

        var_dump($result);die();
    }
}
