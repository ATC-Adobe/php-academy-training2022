<?php

namespace View;

use Router\Response;

class IndexView {
    public function render() {
        (new Response())
            ->render('src/View/ConcreteViews/Index.php');
    }
}