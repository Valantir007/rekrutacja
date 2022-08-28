<?php

declare(strict_types=1);

namespace KamilDemuratRekrutacjaHRtec\Rss\Reader\Connector;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use KamilDemuratRekrutacjaHRtec\Rss\Reader\Exception\NotCorrectStatusCodeResponseException;

class NationalGeographicRssConnector implements RssConnectorInterface
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }


    /**
     * @throws GuzzleException
     * @throws NotCorrectStatusCodeResponseException
     */
    public function read(string $url): string
    {
        $response = $this->client->request('GET', $url, [
            'verify' => false,
        ]);

        if ($response->getStatusCode() < 200 || $response->getStatusCode() >= 300) {
            throw new NotCorrectStatusCodeResponseException(
                sprintf(
                    "Status code for reading url %s is %s and it's not correct", $url, $response->getStatusCode()
                )
            );
        }

        return $response->getBody()->getContents();
    }
}