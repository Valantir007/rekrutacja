<?php

declare(strict_types=1);

namespace KamilDemuratRekrutacjaHRtec\Rss\Reader;

use KamilDemuratRekrutacjaHRtec\Rss\Reader\Connector\RssConnectorInterface;

abstract class RssReader
{
    abstract public function getConnector(): RssConnectorInterface;

    public function read(string $url): string
    {
        return $this->getConnector()->read($url);
    }
}