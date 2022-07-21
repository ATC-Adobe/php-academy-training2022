<?php

namespace View\CompositeComponents\ConcreteNodes\SpecificNodes;

use View\CompositeComponents\LeafNode;

class RoomFormLeaf extends LeafNode {

    public function draw() {
        ?>

        <form method='post' action='/room/add'>
            <div class="float ltable">
                Room name:<br>
                Floor:<br>
            </div>
            <div class="float rtable">
                <input type="text" name="room_name" ><br>
                <input type="text" name="floor" > <br>
            </div>
            <div class="clear"></div>
            <br><br>
            <input type="submit" value="Submit Request >">
        </form>

        <?php
    }
}