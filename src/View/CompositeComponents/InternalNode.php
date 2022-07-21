<?php

namespace View\CompositeComponents;

abstract class InternalNode implements ViewNode {
    protected array $children;

    public function __construct(array $children) {
        $this->children = $children;
    }

    function draw() : void {
        foreach ($this->children as $child) {

            if(! $child instanceof ViewNode) {
                continue;
            }

            $child->draw();
        }
    }
}