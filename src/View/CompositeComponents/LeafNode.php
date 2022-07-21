<?php

namespace View\CompositeComponents;

abstract class LeafNode implements ViewNode {
    public function __construct() { }
    public function draw() { }
}