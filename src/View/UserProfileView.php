<?php

namespace View;

use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentBodyNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentRootNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\FooterLeaf;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\MenuLeaf;
use View\CompositeComponents\ConcreteNodes\SpecificNodes\ProfileLeaf;

class UserProfileView {
    public function render() : void {
        /*(new Response())
            ->render('src/View/ConcreteViews/UserProfileView.php');*/

        $document = new DocumentRootNode([
            new MenuLeaf(),
            new DocumentBodyNode([
                new ProfileLeaf(),
            ],'Room reservation service'),
            new FooterLeaf()
        ]);

        $document->draw();
    }
}