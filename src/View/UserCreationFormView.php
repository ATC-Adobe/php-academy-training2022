<?php

namespace View;

use Router\Response;

class UserCreationFormView {
    public function render() {
        (new Response())
            ->render('src/View/ConcreteViews/UserCreationForm.php');
    }
}