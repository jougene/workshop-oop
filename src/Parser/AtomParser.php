<?php

namespace App\Parser;

use App\Feed\FeedItem;
use Carbon\Carbon;
use App\Feed\FeedAuthor;
use App\Feed\FeedSctructure;

class AtomParser implements ParserInterface
{
    public function parse(string $content): FeedSctructure
    {
        $xml = new \SimpleXMLElement($content);

        return new FeedSctructure(
            $xml->title,
            $xml->subtitle,
            $xml->link->attributes()->href,
            Carbon::parse($xml->updated),
            new FeedAuthor($xml->author->name, $xml->author->email),
            $this->fillItems($xml->entry)
        );
    }

    private function fillItems(\SimpleXMLElement $items) : array
    {
        if ($items->count() === 1) {
            return [$this->fillOne($items)];
        }

        $feedItems = [];
        foreach ($items as $item) {
            $feedItems[] = $this->fillOne($item);
        }

        return $feedItems;
    }

    private function fillOne($item)
    {
        return new FeedItem(
            $item->title,
            $item->link->attributes()->href,
            $item->id,
            Carbon::parse($item->updated),
            $item->summary
        );
    }
}
