<?php

namespace View;

use JetBrains\PhpStorm\NoReturn;
use Router\Response;

class ReservationListingView {
    #[NoReturn] public function render() {
        (new Response())
            ->render('src/View/ConcreteViews/ReservationView.php');
    }
}