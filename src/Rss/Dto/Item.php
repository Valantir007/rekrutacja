<?php

declare(strict_types=1);

namespace KamilDemuratRekrutacjaHRtec\Rss\Dto;

use DateTime;
use JMS\Serializer\Annotation as Serializer;

class Item
{
    /**
     * @Serializer\SerializedName("title")
     */
    private string $title;

    /**
     * @Serializer\SerializedName("description")
     */
    private string $description;

    /**
     * @Serializer\SerializedName("link")
     */
    private string $link;

    /**
     * @Serializer\Type("DateTime<'D, d M Y H:i:s O'>")
     * @Serializer\SerializedName("pubDate")
     */
    private DateTime $pubDate;

    /**
     * @Serializer\SerializedName("dc:creator")
     */
    private string $creator;


    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    public function getPubDate(): DateTime
    {
        return $this->pubDate;
    }

    public function setPubDate(DateTime $pubDate): void
    {
        $this->pubDate = $pubDate;
    }

    public function getCreator(): string
    {
        return $this->creator;
    }

    public function setCreator(string $creator): void
    {
        $this->creator = $creator;
    }
}