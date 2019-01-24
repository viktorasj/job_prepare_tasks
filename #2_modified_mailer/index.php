<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();


$loader = new Twig_Loader_Filesystem('View', __DIR__ . '/src/');
$twig = new Twig_Environment($loader, ['cache' => __DIR__ . '/cache', 'debug' => true]);
$controller = new \Controller\MainController();

$renderData = $controller->sendEmail($request);

$renderData['context']['resources_dir'] = 'src/Resources';
$content = $twig->render($renderData['template'], $renderData['context']);

$response = new Response(
    $content,
    Response::HTTP_OK,
    array('content-type' => 'text/html')
);
//$response->prepare($request);
$response->send();


