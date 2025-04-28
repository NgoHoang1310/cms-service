<?php
// app/Services/Queue/Producers/BaseProducer.php

namespace App\Services\Queue\Producers;

use App\Services\Queue\QueueService;

abstract class BaseProducer
{
    protected $queueService;
    protected $routingKey;

    public function __construct(QueueService $queueService)
    {
        $this->queueService = $queueService;
    }

    public function publish(array $data)
    {
        $message = json_encode($data);
        return $this->queueService->publish($message, $this->getRoutingKey());
    }

    protected function getRoutingKey()
    {
        return $this->routingKey;
    }
}
