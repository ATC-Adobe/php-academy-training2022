<?php

namespace View;

use Router\Response;

class UserLogInFormView {
    public function render() {
        (new Response())
            ->render('src/View/ConcreteViews/UserLogInForm.php');
    }
}