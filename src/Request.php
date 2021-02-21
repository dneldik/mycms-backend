<?php

declare(strict_types=1);

namespace Api;

class Request
{
  private $uri;

  public function __construct(string $uri)
  {
    $this->uri = $uri;
  }

  // Todo:
  // handle request uri
}
