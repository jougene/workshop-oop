<?php

use App\Main;
use App\Reader\FileReader;
use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    /** @test */
    public function convert_file_from_rss_to_atom()
    {
        $app = new Main(new FileReader());

        $result = $app->run();
    }
}
