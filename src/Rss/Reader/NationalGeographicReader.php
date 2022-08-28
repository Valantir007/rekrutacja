<?php

declare(strict_types=1);

namespace KamilDemuratRekrutacjaHRtec\Rss\Reader;

use GuzzleHttp\Client;
use KamilDemuratRekrutacjaHRtec\Rss\Reader\Connector\NationalGeographicRssConnector;
use KamilDemuratRekrutacjaHRtec\Rss\Reader\Connector\RssConnectorInterface;

class NationalGeographicReader extends RssReader
{
    public function getConnector(): RssConnectorInterface
    {
        return new NationalGeographicRssConnector(new Client());
    }
}