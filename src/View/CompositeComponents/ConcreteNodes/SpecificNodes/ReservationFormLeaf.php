<?php

namespace View\CompositeComponents\ConcreteNodes\SpecificNodes;

use View\CompositeComponents\LeafNode;

class ReservationFormLeaf extends LeafNode {
    public function draw() {
        ?>

        <script src="/layout/js/reservationValidator.js"> </script>

        <form method='post' action='/reservation/add'>
            <div class="float ltable">
                Room Id:<br>
                <br>
                From: <br>
                To: <br>
                <br>
                <br>
                Save to:<br>
            </div>
            <div class="float rtable">

                <?php
                $id = 0;

                // we dont want to loose room id information
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                /*elseif(isset($_POST['room_id'])) {
                    $id = $_POST['room_id'];
                }*/
                else {
                    die('Critical error -> no room specified');
                }

                echo '<input type="hidden" name="room_id" value="'.htmlspecialchars($id).'">';
                echo htmlspecialchars($id).'<br>';
                ?>
                <br>
                <input id="timeFrom" type="datetime-local" name="from"><br>
                <input id="timeTo"   type="datetime-local" name="to"><br>
                <span id="message"></span><br>
                <br>

                <input type="radio" name="option" value="db" checked>
                <label for="html">Database</label><br>
                <input type="radio" name="option" value="json">
                <label for="html">JSON</label><br>
                <input type="radio" name="option" value="xml">
                <label for="html">XML</label><br>
                <input type="radio" name="option" value="csv">
                <label for="html">CSV</label><br>


            </div>
            <div class="clear"></div>
            <br><br>
            <input type="submit" value="Submit Request >">
        </form>
        <?php
    }
}