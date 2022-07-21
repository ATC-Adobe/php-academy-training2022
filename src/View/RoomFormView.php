<?php

namespace View;

use JetBrains\PhpStorm\NoReturn;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentBodyNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentRootNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\FooterLeaf;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\MenuLeaf;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\StatusLeaf;
use View\CompositeComponents\ConcreteNodes\SpecificNodes\RoomFormLeaf;

class RoomFormView {
    #[NoReturn] public function render() {
        /*(new Response())
            ->render('src/View/ConcreteViews/RoomForm.php');*/

        $document = new DocumentRootNode([
            new MenuLeaf(),
            new DocumentBodyNode([
                new StatusLeaf(),
                new RoomFormLeaf(),
            ], 'Add Room'),
            new FooterLeaf(),
        ]);

        $document->draw();
    }
}