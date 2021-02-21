<?php

declare(strict_types=1);

namespace Api;

$root = $_SERVER["DOCUMENT_ROOT"];

require_once "{$root}/src/Request.php";
require_once "{$root}/src/HttpHeaders.php";


$requestUri = $_SERVER['REQUEST_URI'];
$Request = new Request($requestUri);

// Todo:
// Handle data that will be send back as response.

(new HttpHeaders())->setHeaders();
