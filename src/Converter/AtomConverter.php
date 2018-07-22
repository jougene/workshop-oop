<?php

namespace App\Converter;

use App\Feed\FeedSctructure;
use App\Helper;

class AtomConverter implements ConverterInterface
{
    public function convert(FeedSctructure $structure)
    {
        $feedArray = $structure->jsonSerialize();

        $array = [
            'title' => $feedArray['title'],
            'subtitle' => $feedArray['description'],
            'link' => $feedArray['link'],
            'updated' => $feedArray['updatedAt'],
            'author' => [
                'name' => $feedArray['author']['name'],
                'email' => $feedArray['author']['email'],
            ],
            'entry' => $this->extractItems($feedArray['items'])
        ];

        $xml = new \SimpleXMLElement('<feed xmlns="http://www.w3.org/2005/Atom"/>');

        $xml = Helper::toXml($xml, $array);

        $xmlString = $xml->asXml();
        $withEncoding = $this->addEncoding($xmlString);

        return $withEncoding;
    }

    private function extractItems(array $items)
    {
        $res = [];
        foreach ($items as $item) {
            $res[] = $item->jsonSerialize();
        }
        return $res;
    }

    private function addEncoding($xmlString)
    {
        return str_replace('xml version="1.0"', 'xml version="1.0" encoding="utf-8"', $xmlString);
    }
}