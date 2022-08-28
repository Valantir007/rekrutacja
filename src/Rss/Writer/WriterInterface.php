<?php

declare(strict_types=1);

namespace KamilDemuratRekrutacjaHRtec\Rss\Writer;

use KamilDemuratRekrutacjaHRtec\Rss\Printer\PrinterInterface;

interface WriterInterface
{
    public function write(array $headers, PrinterInterface $printer, string $filePath): void;
}