<?php

namespace View\CompositeComponents\ConcreteNodes\SpecificNodes;

use Model\Room\Model\RoomModel;
use Model\Room\Repository\RoomConcreteRepository;
use View\CompositeComponents\LeafNode;

class RoomListLeaf extends LeafNode {
    public function draw() {
        ?>

        <span style="font-size: 1.5em">Choose room to continue:</span> <br><br><br><br>

        <table>
                <tr>
                    <th style="width:10%">ID</th>
                    <th style="width:40%">Name</th>
                    <th style="width:10%">Floor</th>
                    <th> </th>
                </tr>
                <tr>&#8203;</tr>

            <?php
            $entries = (new RoomConcreteRepository())
                ->getAllRooms();

            foreach($entries as $entry) {

                if(! $entry instanceof RoomModel) {
                    echo "This should not happen";
                    die();
                }

                $id     = $entry->getId();
                $name   = htmlspecialchars($entry->getName());
                $floor  = htmlspecialchars($entry->getFloor());

                echo "<tr>";
                echo "<td> $id </td>";
                echo "<td> $name </td>";
                echo "<td> $floor </td>";

                echo "<td><a href='/reservation/add?id=$id'> Reserve ></a></td>";

                echo "</tr>";
            }
            ?>
            <tr>&#8203;</tr>
        </table>
    <?php
    }
}