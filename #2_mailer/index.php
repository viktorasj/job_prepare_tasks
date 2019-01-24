<?php

require __DIR__ . '/vendor/autoload.php';

use \Services\Container;

$container = new Container();
$sender = $container->getSender();
$sender->send('recipient@gmail.com', 'title', 'message body');