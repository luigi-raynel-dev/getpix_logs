<?php

declare(strict_types=1);

use Hyperf\Kafka\Constants\KafkaStrategy;
use function Hyperf\Support\env;

return [
  'default' => [
    'connect_timeout' => -1,
    'send_timeout' => -1,
    'recv_timeout' => -1,
    'client_id' => '',
    'max_write_attempts' => 3,
    'bootstrap_servers' => env('KAFKA_SERVERS', 'getpix_kafka:9092'),
    'acks' => 0,
    'producer_id' => -1,
    'producer_epoch' => -1,
    'partition_leader_epoch' => -1,
    'interval' => 0,
    'session_timeout' => 60,
    'rebalance_timeout' => 60,
    'replica_id' => -1,
    'rack_id' => '',
    'group_retry' => 5,
    'group_retry_sleep' => 1,
    'group_heartbeat' => 3,
    'offset_retry' => 5,
    'auto_create_topic' => true,
    'partition_assignment_strategy' => KafkaStrategy::RANGE_ASSIGNOR,
    'sasl' => [],
    'ssl' => [],
  ],
];
