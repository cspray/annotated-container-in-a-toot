<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainerInAToot\Factory;

use Cspray\AnnotatedContainer\Attribute\ServiceDelegate;
use Cspray\AnnotatedContainerInAToot\Repository\WidgetRepository;
use Cspray\AnnotatedContainerInAToot\Services\WidgetService;
use Psr\Container\ContainerInterface;

final class WidgetServiceFactory {

    private function __construct() {}

    #[ServiceDelegate]
    public static function createWidgetService(ContainerInterface $container) : WidgetService {
        return new WidgetService($container->get(WidgetRepository::class));
    }

}