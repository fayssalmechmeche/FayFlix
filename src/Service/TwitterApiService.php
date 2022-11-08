<?php

namespace App\Service;

use Noweh\TwitterApi\Client;
use Noweh\TwitterApi\Enum\Operators;
use Abraham\TwitterOAuth\TwitterOAuth;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class TwitterApiService
{
    private $getParams;

    public function __construct(ParameterBagInterface $getParams)
    {
        $this->getParams = $getParams;
    }

    public function post()
    {





        $settings = [
            'account_id' => 1589688925320265729,
            'consumer_key' => $this->getParams->get('TWITTER_CONSUMER_KEY'),
            'consumer_secret' => $this->getParams->get('TWITTER_CONSUMER_SECRET'),
            'bearer_token' => 'AAAAAAAAAAAAAAAAAAAAALgyjAEAAAAAtFcAoXqIRPBfthZYO8Jr93NesoE%3D9nRCN8CUmMbkqG5Rgm1jWebEcI1SZh6bNRjusbv9hJCmpquPui',
            'access_token' => $this->getParams->get('TWITTER_ACCESS_TOKEN'),
            'access_token_secret' => $this->getParams->get('TWITTER_ACCESS_TOKEN_SECRET')
        ];

        $client = new Client($settings);

        $return = $client->tweetSearch()
            ->showMetrics()
            ->addFilterOnKeywordOrPhrase([
                'fayflix'
            ], Operators::and)

            ->showUserDetails()
            ->performRequest();



        $array = json_decode(json_encode($return), true);

        $result = $array['includes']['users'][0]['username'];

        $return = $client->tweet()->performRequest('POST', ['text' => "@$result re"]);
    }
}
