<?php

namespace View;

use JetBrains\PhpStorm\NoReturn;
use Router\Response;

class RoomFormView {
    #[NoReturn] public function render() {
        (new Response())
            ->render('src/View/ConcreteViews/RoomForm.php');
    }
}