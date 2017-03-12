<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/** @var ClassLoader $loader */
$loader = require __DIR__.'/../vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

return $loader;
