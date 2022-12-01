<?php 
require '../vendor/autoload.php';

$app = new \Framework\App();

// utilise \GuzzleHttp\Psr7 pour gérer les variable server global
$response = $app->run(\GuzzleHttp\Psr7\ServerRequest::fromGlobals());

// utilise http interop pour transmettre des objets psr7
\Http\response\send($response);

?>
