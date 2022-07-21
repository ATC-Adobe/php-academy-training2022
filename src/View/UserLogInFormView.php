<?php

namespace View;

use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentBodyNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentRootNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\FooterLeaf;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\MenuLeaf;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\StatusLeaf;
use View\CompositeComponents\ConcreteNodes\SpecificNodes\UserLoginFormLeaf;

class UserLogInFormView {
    public function render() {
        /*(new Response())
            ->render('src/View/ConcreteViews/UserLogInForm.php');*/

        $document = new DocumentRootNode([
            new MenuLeaf(),
            new DocumentBodyNode([
                new StatusLeaf(),
                new UserLoginFormLeaf(),
            ],'Login'),
            new FooterLeaf()
        ]);

        $document->draw();
    }
}