<?php

use Symfony\Component\HttpFoundation\Request;

/** @var \Composer\Autoload\ClassLoader $loader */
$loader = require __DIR__.'/../app/autoload.php';
include_once __DIR__.'/../var/bootstrap.php.cache';

$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();
//$kernel = new AppCache($kernel);

$request = Request::createFromGlobals();
Request::setTrustedProxies(array($request->server->get('REMOTE_ADDR')));
Request::setTrustedHeaderName(Request::HEADER_FORWARDED, null);
Request::setTrustedHeaderName(Request::HEADER_CLIENT_HOST, null);
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
