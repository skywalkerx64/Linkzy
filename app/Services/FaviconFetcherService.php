<?php

namespace App\Services;

use GuzzleHttp\Client;

class FaviconFetcherService
{
    private const GOOGLE_FAVICON_FETCHER_URL = 'https://www.google.com/s2/favicons?domain=';

    public static function fetchFromUrl(string $url)
    {
        $url = self::GOOGLE_FAVICON_FETCHER_URL.urlencode($url);

        $client = (new Client())->get($url);

        return self::convertFileToBase64($client->getBody()->getContents());
    }

    public static function convertFileToBase64(string $file)
    {
        return base64_encode($file);
    }
}
