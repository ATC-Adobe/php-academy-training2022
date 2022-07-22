<?php

namespace View\CompositeComponents\ConcreteNodes\SpecificNodes;

use View\CompositeComponents\LeafNode;

class ProfileEditorLeaf extends LeafNode {
    public function draw() {
        ?>

        <script src="/layout/js/registrationValidator.js"></script>

        <div class="float ltable">

            Name:<br>
            Surname:<br>
            Email:<br>
            <br>
            Nickname:<br>
            <br>
        </div>
        <div class="float rtable">
            <?php
            $sess = \System\Util\Session::getInstance();

            echo $sess->get('name').'<br>';
            echo $sess->get('surname').'<br>';
            echo $sess->get('email').'<br>';
            echo '<br>';
            echo $sess->get('username').'<br>';
            echo '<br>';
            ?>

        </div>
        <div class="clear"></div>
        <br>
        Password reset:<br>
        <form method="post" action="/user/password">

            <div class="float ltable">
                Current password: <br>
                <br>
                New password:<br>
                Repeat new password: <br>
                <br>
            </div>
            <div class="float rtable">
                <input type="password" name="currpass"><br>
                <br>
                <input type="password" name="pass1" id="pass1Input"><br>
                <input type="password" name="pass2" id="pass2Input"><br>
                <span id="passSpan"></span>
            </div>
            <div class="clear"></div>

            <input type="submit" value = "Change Password">
        </form>


        <?php
    }
}