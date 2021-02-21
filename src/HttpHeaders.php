<?php

declare(strict_types=1);

namespace Api;

class HttpHeaders
{
  public function setHeaders(): void
  {
    // Todo:
    // set proper http headers (do it right :)
    header('Access-Control-Allow-Origin: http://localhost');
    // header('Content-Type: application/json');
  }
}
