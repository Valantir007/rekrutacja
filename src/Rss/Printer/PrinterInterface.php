<?php

declare(strict_types=1);

namespace KamilDemuratRekrutacjaHRtec\Rss\Printer;

interface PrinterInterface
{
    public function getRows(): array;
}