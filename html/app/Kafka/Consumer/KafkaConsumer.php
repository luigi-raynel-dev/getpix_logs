<?php

declare(strict_types=1);

namespace App\Kafka\Consumer;

use Hyperf\Kafka\AbstractConsumer;
use Hyperf\Kafka\Annotation\Consumer;
use longlang\phpkafka\Consumer\ConsumeMessage;
use App\Model\Log;

#[Consumer(topic: 'getpix.logs', groupId: 'hyperf', autoCommit: true, nums: 1)]
class KafkaConsumer extends AbstractConsumer
{
    public function consume(ConsumeMessage $message)
    {
        (new Log)->collection->insertOne([
            'event' => json_decode($message->getValue()),
            'topic' => $message->getTopic(),
            'partition' => $message->getPartition(),
            'key' => $message->getKey()
        ]);
    }
}
