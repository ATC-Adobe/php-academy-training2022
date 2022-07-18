<?php

namespace View;

use Router\Response;

class RoomListingView {
    public function render() {
        (new Response())
            ->render('src/View/ConcreteViews/RoomView.php');
    }
}