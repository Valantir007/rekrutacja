<?php

declare(strict_types=1);

namespace KamilDemuratRekrutacjaHRtec\Rss\Dto;

use JMS\Serializer\Annotation as Serializer;

class Rss
{
    /**
     * @Serializer\SerializedName("channel")
     */
    private Channel $channel;

    public function getChannel(): Channel
    {
        return $this->channel;
    }

    public function setChannel($channel): void
    {
        $this->channel = $channel;
    }


}