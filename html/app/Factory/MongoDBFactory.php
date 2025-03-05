<?php

declare(strict_types=1);

namespace App\Factory;

use Hyperf\Contract\ConfigInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Context\ApplicationContext;
use MongoDB\Client;

class MongoDBFactory
{
  private static ?Client $client = null;

  #[Inject]
  protected ConfigInterface $config;

  public static function getClient(): Client
  {
    if (self::$client === null) {
      $container = ApplicationContext::getContainer();
      $config = $container->get(ConfigInterface::class);

      $uri = $config->get('mongodb.uri', 'mongodb://localhost:27017');
      self::$client = new Client($uri);
    }

    return self::$client;
  }

  /**
   * @param string|null $dbName
   */
  public static function getDatabase($dbName = null)
  {
    $client = self::getClient();
    $container = ApplicationContext::getContainer();
    $config = $container->get(ConfigInterface::class);

    $dbName = $dbName ?? $config->get('mongodb.database', 'default_db');

    return $client->selectDatabase($dbName);
  }
}
