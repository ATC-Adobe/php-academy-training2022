<?php

namespace View;

use Router\Response;

class ReservationFormView {
    public function render() {
        (new Response())
            ->render('src/View/ConcreteViews/ReservationForm.php');
    }
}