<?php

declare(strict_types=1);

namespace App\Model;

use App\Trait\MongoDBConnection;
use MongoDB\Collection;

class Log
{
  use MongoDBConnection;

  protected string $table = 'logs';

  public ?Collection $collection;

  public function __construct()
  {
    $this->connect();
  }
}
