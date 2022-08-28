<?php

declare(strict_types=1);

namespace KamilDemuratRekrutacjaHRtec\Rss\Dto;

use JMS\Serializer\Annotation as Serializer;

class Channel
{
    /**
     * @Serializer\XmlList(inline = true, entry = "item")
     * @Serializer\Type("array<KamilDemuratRekrutacjaHRtec\Rss\Dto\Item>")
     */
    private array $items = [];

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }
}