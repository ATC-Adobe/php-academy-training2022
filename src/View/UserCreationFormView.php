<?php

namespace View;

use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentBodyNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentRootNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\FooterLeaf;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\MenuLeaf;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\StatusLeaf;
use View\CompositeComponents\ConcreteNodes\SpecificNodes\UserRegistrationFormLeaf;

class UserCreationFormView {
    public function render() {
        /*(new Response())
            ->render('src/View/ConcreteViews/UserCreationForm.php');*/

        $document = new DocumentRootNode([
            new MenuLeaf(),
            new DocumentBodyNode([
                new StatusLeaf(),
                new UserRegistrationFormLeaf(),
            ],'Register new account'),
            new FooterLeaf()
        ]);

        $document->draw();
    }
}