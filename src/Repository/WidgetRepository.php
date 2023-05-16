<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainerInAToot\Repository;

use Cspray\AnnotatedContainer\Attribute\Service;
use Cspray\AnnotatedContainerInAToot\Widget;

#[Service]
class WidgetRepository {

    private array $store = [];

    public function save(Widget $widget) : void {
        $this->store[$widget->id] = $widget;
    }

    public function get(string $id) : ?Widget {
        return $this->store[$id] ?? null;
    }

}