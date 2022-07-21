<?php

namespace View;

use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentBodyNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentRootNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\FooterLeaf;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\MenuLeaf;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\StatusLeaf;
use View\CompositeComponents\ConcreteNodes\SpecificNodes\RoomListLeaf;

class RoomListingView {
    public function render() {
        /*(new Response())
            ->render('src/View/ConcreteViews/RoomView.php');*/

        $document = new DocumentRootNode([
            new MenuLeaf(),
            new DocumentBodyNode([
                new StatusLeaf(),
                new RoomListLeaf(),
            ],'Room reservation service'),
            new FooterLeaf()
        ]);

        $document->draw();
    }
}