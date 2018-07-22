<?php

namespace App\Feed;

class FeedAuthor implements \JsonSerializable
{
    private $name;
    private $email;

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'email' => $this->email
        ];
    }
}