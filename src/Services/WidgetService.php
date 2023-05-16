<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainerInAToot\Services;

use Cspray\AnnotatedContainer\Attribute\Service;
use Cspray\AnnotatedContainerInAToot\Repository\WidgetRepository;
use Cspray\AnnotatedContainerInAToot\Widget;

#[Service]
final class WidgetService {

    public function __construct(
        private readonly WidgetRepository $repository
    ) {}

    public function createWidget(string $id) : Widget {
        $widget = new Widget($id);
        $this->repository->save($widget);
        return $widget;
    }

    public function fetchWidget(string $id) : ?Widget {
        return $this->repository->get($id);
    }

}