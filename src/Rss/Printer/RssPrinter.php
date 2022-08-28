<?php

declare(strict_types=1);

namespace KamilDemuratRekrutacjaHRtec\Rss\Printer;

use DateTimeZone;
use IntlDateFormatter;
use KamilDemuratRekrutacjaHRtec\Rss\Dto\Rss;

class RssPrinter implements PrinterInterface
{
    private Rss $rss;

    public function __construct(Rss $rss)
    {
        $this->rss = $rss;
    }

    public function getRows(): array
    {
        $formatter = new IntlDateFormatter(
            'pl_PL',
            IntlDateFormatter::NONE,
            IntlDateFormatter::NONE,
            new DateTimeZone("Europe/Warsaw"),
            null,
            "dd MMMM Y HH:mm:ss"
        );
        $formatter->setLenient(false);

        $rows = [];

        foreach ($this->rss->getChannel()->getItems() as $item) {
            $pubDate = $formatter->format($item->getPubDate());

            $rows[] = [
                $item->getTitle(),
                strip_tags($item->getDescription()),
                $item->getLink(),
                $pubDate,
                $item->getCreator()
            ];
        }

        return $rows;
    }
}