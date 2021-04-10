<?php

declare(strict_types=1);

namespace Api;

class Request
{
  private array $server;

  public function __construct(array $server)
  {
    $this->server = $server;
  }

  /**
  * Read parameter from server['QUERY_STRING'].
  * Returns parameters after sanitization as an array.
  */
  public function getUrlParameters(): array
  {
    $safeUrlParams = [];
    if(isset($this->server['QUERY_STRING'])) {
      parse_str($this->server['QUERY_STRING'], $urlParams);
      $safeUrlParams = $this->iterate($urlParams, array($this, 'getSafeString'));
    }
    return $safeUrlParams;
  }

  /**
  * Iterates over an $array given as parameter.
  * Returns new array. Every key and value of new array
  * is returned by $callback function.
  * $callbac function must return string.
  */
  private function iterate(array $array, callable $callback): array
  {
    $finalArray = [];

    if(is_array($array)) {

      foreach ($array as $key => $value) {

        if(is_array($value)) {
          $value = $this->iterate($value, $callback);
        }

        $safeKey = $callback($key);

        if(!is_array($value)) {
          $safeValue = $callback($value);
          $finalArray[$safeKey] = $safeValue;
        } else {
          $finalArray[$safeKey] = $value;
        }
      }
    }
    return $finalArray;
  }

  /**
  * Sanitizes $string given as parameter.
  * Returns sanitized string.
  * Removes HTML and PHP tags.
  * Sanitizes string.
  * Removes special characters.
  */
  private function getSafeString(string $string): string
  {
    $finalString = $string;
    $finalString = strip_tags($finalString);
    $finalString = filter_var($finalString, FILTER_SANITIZE_STRING);
    $finalString = preg_replace('/[^A-Za-z0-9\-]/', '', $finalString);

    return $finalString;
  }
}
