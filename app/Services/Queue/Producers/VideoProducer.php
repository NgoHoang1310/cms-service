<?php
// app/Services/Queue/Producers/VideoProducer.php

namespace App\Services\Queue\Producers;

class VideoProducer extends BaseProducer
{
    protected string $routingKey = 'video.processing';
    const PROCESSING_TYPE_UPLOAD = 'video.processing.upload';
    const PROCESSING_TYPE_REVERT = 'video.processing.revert';

    public function processVideo(array $videoData, string $type = self::PROCESSING_TYPE_UPLOAD)
    {
        return $this->publish([
            'type' => $type,
            'data' => $videoData,
            'timestamp' => now()->timestamp
        ]);
    }
}
