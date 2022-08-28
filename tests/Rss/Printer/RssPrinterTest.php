<?php

namespace KamilDemuratRekrutacjaHRtec\Rss\Printer;

use DateTime;
use KamilDemuratRekrutacjaHRtec\Rss\Dto\Channel;
use KamilDemuratRekrutacjaHRtec\Rss\Dto\Item;
use KamilDemuratRekrutacjaHRtec\Rss\Dto\Rss;
use PHPUnit\Framework\TestCase;

class RssPrinterTest extends TestCase
{
    public function testEmptyArrayToPrint()
    {
        $rss = new Rss();
        $channel = new Channel();
        $rss->setChannel($channel);

        $printer = new RssPrinter($rss);

        $dataToPrint = $printer->getRows();

        $this->assertEquals([], $dataToPrint);
    }

    /**
     * @throws \Exception
     */
    public function testNotEmptyArrayToPrint()
    {
        $rss = new Rss();
        $channel = new Channel();
        $item = new Item();
        $item->setTitle("test");
        $item->setDescription("test with <div>html</div>");
        $item->setLink("test");
        $item->setPubDate((new DateTime())->setTimestamp(1661684581));
        $item->setCreator("Test Testowy");

        $channel->setItems([
            $item,
        ]);
        $rss->setChannel($channel);

        $printer = new RssPrinter($rss);
        $dataToPrint = $printer->getRows();

        $this->assertEquals([
            [
                "test",
                "test with html",
                "28 sierpnia 2022 13:03:01",
                "Test Testowy"
            ]
        ], $dataToPrint);
    }
}
