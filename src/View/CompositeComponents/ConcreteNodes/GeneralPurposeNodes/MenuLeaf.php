<?php

namespace View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes;

use System\Util\Authenticator;
use View\CompositeComponents\LeafNode;

class MenuLeaf extends LeafNode {

    public function draw() {

        $auth = new Authenticator();

        ?>
        <div class="sticky">
            <div class="inner-sticky">
                <a href = "/">Menu</a>
                <a href = "/room/list">Room reservation</a>

                <?php
                    if($auth->isLogged()) {
                        echo '<a href = "/room/add" > Add room </a >';
                    }
                ?>
                <a href = "/reservation/list">Reservations</a>

                <?php

                    $sess = \System\Util\Session::getInstance();

                    if($auth->isLogged()) {
                        echo '<a href = "/user/logout">Log out</a>';
                        echo 'Logged as: <a href="/reservation/user">'
                            .htmlspecialchars($sess->get('username')).'</a>';
                        echo '<a href = "/user/info">Info</a>';
                    }
                    else {
                        echo '<a href = "/user/add">Sign in</a>';
                        echo '<a href = "/user/login">Log in</a>';
                    }
                ?>


            </div>
        </div>

        <?php
    }
}