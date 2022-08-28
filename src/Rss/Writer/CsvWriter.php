<?php

declare(strict_types=1);

namespace KamilDemuratRekrutacjaHRtec\Rss\Writer;

use KamilDemuratRekrutacjaHRtec\Rss\Printer\PrinterInterface;

class CsvWriter implements WriterInterface
{
    protected bool $append = false;

    public function __construct(bool $append = false)
    {
        $this->append = $append;
    }

    public function write(array $headers, PrinterInterface $printer, string $filePath): void
    {
        $mode = $this->append ? "a" : "aw";

        $exists = $this->exists($filePath);

        $filePointer = fopen($filePath, $mode);

        //jesli plik nie istnial, to funkcja fopen stworzy plik, a my dodajemy do niego naglowki. Jesli plik istnial
        //to naglowki sa dodane wczesniej i nie ma sensu dodawac ich znowu
        if (!$exists) {
            fputcsv($filePointer, $headers);
        }

        foreach ($printer->getRows() as $row) {

            fputcsv($filePointer, $row);
        }

        fclose($filePointer);
    }

    protected function exists(string $filePath)
    {
        return file_exists($filePath);
    }
}