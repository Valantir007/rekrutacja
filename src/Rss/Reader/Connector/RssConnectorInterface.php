<?php

declare(strict_types=1);

namespace KamilDemuratRekrutacjaHRtec\Rss\Reader\Connector;

interface RssConnectorInterface
{
    public function read(string $url): string;
}