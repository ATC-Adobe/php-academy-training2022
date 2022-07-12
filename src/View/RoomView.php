<?php

namespace View;

use Room\Model\RoomModel;
use Room\Repository\RoomConcreteRepository;

class RoomView {
    public function __construct() {
    }

    public function print(): void {

        echo '<table>
                <tr>
                    <th style="width:10%">ID</th>
                    <th style="width:40%">Name</th>
                    <th style="width:10%">Floor</th>
                    <th> </th>
                </tr>
                <tr>&#8203;</tr>';

        $entries = (new RoomConcreteRepository())
            ->getAllRooms();

        foreach($entries as $entry) {

            if(! $entry instanceof RoomModel) {
                echo "This should not happen";
                die();
            }

            $id     = $entry->getId();
            $name   = $entry->getName();
            $floor  = $entry->getFloor();

            echo "<tr>";
            echo "<td> $id </td>";
            echo "<td> $name </td>";
            echo "<td> $floor </td>";
            echo "<td><form method='GET' action='roomReservationForm.php'>
                                <input type='hidden' name='id' value='$id'>
                                <input type='submit' value='Reserve'>
                              </form></td>";
            echo "</tr>";
        }

        echo "<tr>&#8203;</tr>
                </table>";
    }
}
?>


