<?php
// app/Services/Queue/Producers/VideoProducer.php

namespace App\Services\Queue\Producers;

class VideoProducer extends BaseProducer
{
    protected $routingKey = 'video.processing';

    public function processVideo(array $videoData)
    {
        return $this->publish([
            'type' => 'video.processing',
            'data' => $videoData,
            'timestamp' => now()->timestamp
        ]);
    }
}
