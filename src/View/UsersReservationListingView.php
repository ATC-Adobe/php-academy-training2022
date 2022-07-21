<?php

namespace View;

use System\Util\Session;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentBodyNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\DocumentRootNode;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\FooterLeaf;
use View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes\MenuLeaf;
use View\CompositeComponents\ConcreteNodes\SpecificNodes\ProfileLeaf;
use View\CompositeComponents\ConcreteNodes\SpecificNodes\ReservationListLeaf;

class UsersReservationListingView {
    public function render() {
        /*(new Response())
            ->render('src/View/ConcreteViews/UsersReservationView.php');*/

        $sess = Session::getInstance();
        $uid = $sess->get('id');

        $document = new DocumentRootNode([
            new MenuLeaf(),
            new DocumentBodyNode([
                new ProfileLeaf(),
                new ReservationListLeaf($uid)
            ], 'Active Reservations'),
            new FooterLeaf()
        ]);

        $document->draw();
    }
}