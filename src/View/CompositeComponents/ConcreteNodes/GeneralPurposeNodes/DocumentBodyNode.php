<?php

namespace View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes;

use View\CompositeComponents\InternalNode;

class DocumentBodyNode extends InternalNode {

    private string $title;

    public function __construct(array $children, string $title = '') {
        parent::__construct($children);
        $this->title = $title;
    }

    public function draw(): void {
        ?>

        <div class="header">
            <?php echo $this->title; ?>
            <br><br>
            <div class="main">
                <?php
                    parent::draw();
                ?>
            </div>
        </div>

        <?php
    }
}