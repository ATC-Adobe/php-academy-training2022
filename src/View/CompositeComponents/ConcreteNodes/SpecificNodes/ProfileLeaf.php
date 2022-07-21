<?php

namespace View\CompositeComponents\ConcreteNodes\SpecificNodes;

use View\CompositeComponents\LeafNode;

class ProfileLeaf extends LeafNode {
    public function draw() {
        ?>

        <div class="float ltable">
            ID:<br>
            <br>
            Name:<br>
            Surname:<br>
            Email:<br>
            <br>
            Nickname:<br>
            <br>
            Page Style:<br>
            <br>
            <br>
            <br>
            <br>
        </div>
        <div class="float rtable">
            <?php
            $sess = \System\Util\Session::getInstance();

            echo $sess->get('id').'<br>';
            echo '<br>';
            echo $sess->get('name').'<br>';
            echo $sess->get('surname').'<br>';
            echo $sess->get('email').'<br>';
            echo '<br>';
            echo $sess->get('username').'<br>';
            echo '<br>';
            ?>
            <form method="post" action="/user/style">
                <input type="radio" name="option" value="default" checked>
                <label for="html">Default</label><br>
                <input type="radio" name="option" value="style1">
                <label for="html">Style 1</label><br>
                <input type="radio" name="option" value="style2">
                <label for="html">Style 2</label><br>
                <input type="radio" name="option" value="style3">
                <label for="html">Style 3</label><br>
                <br>
                <input type="submit" value="Submit">
            </form>

        </div>
        <div class="clear"></div>
        <br><br>


        <?php
    }
}