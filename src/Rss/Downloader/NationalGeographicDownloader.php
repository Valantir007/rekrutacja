<?php
declare(strict_types=1);

namespace KamilDemuratRekrutacjaHRtec\Rss\Downloader;

use JMS\Serializer\SerializerInterface;
use KamilDemuratRekrutacjaHRtec\Rss\Dto\Rss;
use KamilDemuratRekrutacjaHRtec\Rss\Printer\RssPrinter;
use KamilDemuratRekrutacjaHRtec\Rss\Writer\WriterInterface;
use KamilDemuratRekrutacjaHRtec\Rss\Reader\RssReader;
use Psr\Log\LoggerInterface;

class NationalGeographicDownloader
{
    protected RssReader $rssReader;

    protected SerializerInterface $serializer;

    protected WriterInterface $writer;

    protected LoggerInterface $logger;

    protected array $headers = [
        'title',
        'description',
        'link',
        'pubDate',
        'creator',
    ];

    public function __construct(
        RssReader           $rssReader,
        SerializerInterface $serializer,
        WriterInterface     $writer,
        LoggerInterface     $logger
    ) {
        $this->rssReader = $rssReader;
        $this->serializer = $serializer;
        $this->writer = $writer;
        $this->logger = $logger;
    }

    public function download(string $url, string $filePath): void
    {
        $this->logger->info(sprintf("Reading url %s", $url));
        $content = $this->rssReader->read($url);

        $this->logger->info(sprintf("Deserialization xml content to objects of %s class", Rss::class));
        $rss = $this->serializer->deserialize($content, Rss::class, 'xml');

        $this->logger->info(sprintf("Saving data to file: %s", $filePath));
        $this->writer->write($this->headers, new RssPrinter($rss), $filePath);
    }
}