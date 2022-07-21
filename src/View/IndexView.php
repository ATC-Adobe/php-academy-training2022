<?php

namespace View;

use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentBodyNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentRootNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\FooterLeaf;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\MenuLeaf;
use View\CompositeComponents\ConcreteNodes\SpecificNodes\IndexLeaf;

class IndexView {
    public function render() {
        $document = new DocumentRootNode([
            new MenuLeaf(),
            new DocumentBodyNode([
                new IndexLeaf()
            ], 'Room Reservation Service'),
            new FooterLeaf()
        ]);

        $document->draw();
    }
}