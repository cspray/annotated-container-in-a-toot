<?php declare(strict_types=1);

namespace Cspray\AnnotatedContainerInAToot;

use Cspray\AnnotatedContainer\AnnotatedContainer;
use Cspray\AnnotatedContainer\Autowire\AutowireableParameterSet;
use Cspray\AnnotatedContainer\ContainerFactory\ContainerFactory;
use Cspray\AnnotatedContainer\ContainerFactory\ContainerFactoryOptions;
use Cspray\AnnotatedContainer\ContainerFactory\ParameterStore;
use Cspray\AnnotatedContainer\Definition\ContainerDefinition;
use Psr\Container\ContainerInterface;

class InATootContainerFactory implements ContainerFactory {

    public function createContainer(ContainerDefinition $containerDefinition, ContainerFactoryOptions $containerFactoryOptions = null) : AnnotatedContainer {
        $container = new class implements \Psr\Container\ContainerInterface {
            protected $s=[];
            function __set($k,$c){$this->s[$k]=$c;}
            function __get($k){return $this->s[$k]($this);}
            function get(string $k){return $this->s[$k]($this);}
            function has(string $k): bool {return isset($s[$k]);}
        };

        foreach ($containerDefinition->getServiceDelegateDefinitions() as $serviceDelegateDefinition) {
            $name = $serviceDelegateDefinition->getServiceType()->getName();
            $method = sprintf(
                '%s::%s',
                $serviceDelegateDefinition->getDelegateType()->getName(),
                $serviceDelegateDefinition->getDelegateMethod()
            );
            $container->__set($name, $method);
        }

        return new class($container) implements AnnotatedContainer {

            public function __construct(
                private readonly ContainerInterface $container
            ) {}

            public function getBackingContainer() : ContainerInterface {
                return $this->container;
            }

            public function make(string $classType, AutowireableParameterSet $parameters = null) : object {
                throw new UnsupportedOperation();
            }

            public function invoke(callable $callable, AutowireableParameterSet $parameters = null) : mixed {
                throw new UnsupportedOperation();
            }

            public function get(string $id) {
                return $this->container->get($id);
            }

            public function has(string $id) : bool {
                return $this->container->has($id);
            }
        };
    }

    public function addParameterStore(ParameterStore $parameterStore) : void {
        throw new UnsupportedOperation();
    }
}