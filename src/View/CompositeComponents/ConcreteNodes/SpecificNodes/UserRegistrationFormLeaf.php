<?php

namespace View\CompositeComponents\ConcreteNodes\SpecificNodes;

use View\CompositeComponents\LeafNode;

class UserRegistrationFormLeaf extends LeafNode {
    public function draw() {
        ?>

        <form method="post" action="/user/add">

            <div class="float ltable">
                Name:<br>
                Surname:<br>
                E-mail:<br>
                <br>
                Nickname: <br>
                <br>
                Password: <br>
                Repeat password: <br>
            </div>
            <div class="float rtable">
                <input type="text" name="name" <?php
                    if(isset($_POST['name'])) {
                        echo 'value="'.htmlspecialchars($_POST['name']).'"';
                    }
                ?>><br>

                <input type="text" name="surname" <?php
                if(isset($_POST['surname'])) {
                    echo 'value="'.htmlspecialchars($_POST['surname']).'"';
                }
                ?>><br>
                <input type="text" name="email" id="emailInput" <?php
                if(isset($_POST['email'])) {
                    echo 'value="'.htmlspecialchars($_POST['email']).'"';
                }
                ?>><br>

                <span style="error" id="emailSpan"></span><br>

                <input type="text" name="nickname" <?php
                if(isset($_POST['nickname'])) {
                    echo 'value="'.htmlspecialchars($_POST['nickname']).'"';
                }
                ?>><br>
                <br>
                <input type="password" name="password1" id="pass1Input" <?php
                if(isset($_POST['password1'])) {
                    echo 'value="'.htmlspecialchars($_POST['password1']).'"';
                }
                ?> ><br>
                <input type="password" name="password2" id="pass2Input" <?php
                if(isset($_POST['password2'])) {
                    echo 'value="'.htmlspecialchars($_POST['password2']).'"';
                }
                ?> ><br>
                <span style="error" id="passSpan"></span><br>
                <br>
                <input type="submit" value="Create Account >">

            </div>
            <div class="clear"></div>
        </form>
        <?php
    }
}