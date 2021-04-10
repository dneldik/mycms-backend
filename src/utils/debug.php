<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

function dump($data): void
{
  echo '<br/><div
  style="
  display: inline-block;
  background-color: grey;
  color: black;
  padding: 0px 15px;
  border: 1px solid black;
  "
  >
  <pre>';
  print_r($data);
  echo '</pre>
  </div><br/>';
}
