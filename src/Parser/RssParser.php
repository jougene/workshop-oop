<?php

namespace App\Parser;

use App\Feed\FeedAuthor;
use App\Feed\FeedItem;
use App\Feed\FeedSctructure;
use Carbon\Carbon;

class RssParser implements ParserInterface
{
    public function parse(string $content): FeedSctructure
    {
        $xml = new \SimpleXMLElement($content);

        return new FeedSctructure(
            $xml->channel->title,
            $xml->channel->description,
            $xml->channel->link,
            Carbon::parse($xml->channel->lastBuildDate),
            new FeedAuthor(...$this->parseAuthor($xml->channel->managingEditor)),
            $this->fillItems($xml->xpath('channel//item'))
        );
    }

    private function parseAuthor($authorString)
    {
        [$email, $name] = explode(" (", $authorString);

        return [rtrim($name, ")"), $email];
    }

    private function fillItems($items) : array
    {
        if(!is_array($items)) {
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
            $item->link,
            $item->guid,
            Carbon::parse($item->pubDate),
            $item->description
        );
    }
}