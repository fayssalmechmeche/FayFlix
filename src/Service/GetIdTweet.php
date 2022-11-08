<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;


class GetIdTweet
{

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    public function getIdTweet(): string
    {
        $response = $this->client->request('GET', 'https://api.twitter.com/2/tweets/:id');
    }
}
