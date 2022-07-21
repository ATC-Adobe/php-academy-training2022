<?php

namespace View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes;

use View\CompositeComponents\LeafNode;

class FooterLeaf extends LeafNode {

    public function draw() {
        ?>

        <div class="footer">
            <div class="footer-inner">
                Bottom text
            </div>
        </div>

        <?php
    }
}