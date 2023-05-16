<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainerInAToot\Factory;

use Cspray\AnnotatedContainer\Attribute\ServiceDelegate;
use Cspray\AnnotatedContainerInAToot\Repository\WidgetRepository;

final class WidgetRepositoryFactory {

    private function __construct() {}

    #[ServiceDelegate]
    public static function createWidgetRepository() : WidgetRepository {
        return new WidgetRepository();
    }

}