<?php

namespace View;

use JetBrains\PhpStorm\NoReturn;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentBodyNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentRootNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\FooterLeaf;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\MenuLeaf;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\StatusLeaf;
use View\CompositeComponents\ConcreteNodes\SpecificNodes\FileReservationList;
use View\CompositeComponents\ConcreteNodes\SpecificNodes\ReservationListLeaf;

class ReservationListingView {
    #[NoReturn] public function render() {
        /*(new Response())
            ->render('src/View/ConcreteViews/ReservationView.php');**/

        $document = new DocumentRootNode([
            new MenuLeaf(),
            new DocumentBodyNode([
                new StatusLeaf(),
                new ReservationListLeaf(0),
                new FileReservationList(),
            ], 'Active Reservations'),
            new FooterLeaf()
        ]);

        $document->draw();
    }
}