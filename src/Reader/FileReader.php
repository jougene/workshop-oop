<?php

namespace App\Reader;

class FileReader implements ReaderInterface
{
    public function read(string $path)
    {
        $content = file_get_contents($path);

        return $content;
    }
}