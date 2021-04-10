<?php

declare(strict_types=1);

namespace Api;

$root = $_SERVER["DOCUMENT_ROOT"];

require_once "{$root}/src/Request.php";
require_once "{$root}/src/HttpHeaders.php";

// Function in debug.php - development only.
// Function name: dump. Prints the passed value.
require_once "{$root}/src/utils/debug.php";

$Request = new Request($_SERVER);

// Temporary code for debuging.
echo '<pre>';
print_r($Request->getUrlParameters());
echo '</pre>';

// Todo:
// Handle data that will be send back as response.

(new HttpHeaders())->setHeaders();

// Temporary code to view the value of the SERVER array.
echo '<pre>';
print_r($_SERVER);
echo '</pre>';
