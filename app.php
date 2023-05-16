<?php declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Cspray\AnnotatedContainer\Bootstrap\Bootstrap;
use Cspray\AnnotatedContainerInAToot\InATootContainerFactory;
use Cspray\AnnotatedContainerInAToot\Services\WidgetService;

$bootstrap = new Bootstrap(
    containerFactory: new InATootContainerFactory()
);

$container = $bootstrap->bootstrapContainer();

$service = $container->get(WidgetService::class);

$service->createWidget('Annotated Container ... in a toot!');

$widget = $service->fetchWidget('Annotated Container ... in a toot!');

var_dump($widget);