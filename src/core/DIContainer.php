<?php
namespace src\core;

class DIContainer {

    private $components;

    private $heap;

    public function __construct($components)
    {
        $this->components = $components;
    }

    public function get($name): ?object {
        if (!isset($components[$name])) {
            return null;
        }

        $component = $components[$name];
        $mode = $component['mode'];
        if ($mode == 'new') {
            return $this->createDependency($component);
        } else {
            if (!$this->heap[$name]) {
                $this->heap[$name] = $this->createDependency($component);
            }
            return $this->heap[$name];
        }


    }

    protected function createDependency($dependency) {
        return new $dependency['class']($dependency);
    }

}