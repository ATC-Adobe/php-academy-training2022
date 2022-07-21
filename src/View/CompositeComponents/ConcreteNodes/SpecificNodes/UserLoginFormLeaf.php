<?php

namespace View\CompositeComponents\ConcreteNodes\SpecificNodes;

use View\CompositeComponents\LeafNode;

class UserLoginFormLeaf extends LeafNode {

    public function draw() {
        ?>

       <form method="post" action="/user/login">

            <div class="float ltable">
                E-mail:<br>
                Password: <br>
            </div>
            <div class="float rtable">
                <input type="text" name="username"><br>
                <input type="password" name="password"><br>
                <br>
                <br>
                <input type="submit" value="Log In >">

            </div>
            <div class="clear"></div>
        </form>

        <?php
    }
}