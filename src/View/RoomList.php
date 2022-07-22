<?php

namespace App\View;


use App\Service\RoomService;
use App\View\Component\Alert;
use App\View\Component\Footer;
use App\View\Component\Header;
use App\View\Component\Navbar;
use Component;

class RoomList implements Component
{
    public function __construct(protected iterable|bool $rooms, protected string $alertMsg ="", protected string $type="danger")
    {
    }

    public function render(): void
    {
        (new Header())->render("All rooms");
        (new Navbar())->render();
        echo '
    <div class="container mt-2 ">
    <h2 class="text-center">Available rooms: </h2>
    <table class="myTable mx-auto">
        <tr>
            <th ><p class="text-center">id</p></th>
            <th ><p class="text-center">name</p></th>
            <th class="w-25"><p class="text-center">floor</p></th>
        </tr>';
        if($this->alertMsg) {
            (new Alert($this->alertMsg, $this->type))->render();
        }
//        $_POST['xml'] = true;
//        $handler =  IOHandlerFactory::create("./System/File/data/rooms.xml");
        foreach ($this->rooms as $i => $room) {
            echo '<tr>';
            echo "<td><p>{$room->id}</p></td>";
            echo "<td><p>{$room->name}</p></td>";
            echo "<td class=\"floor\"><p>{$room->floor}</p> <a href=\"/reservationForm?name={$room->name}&id={$room->id}\"><button class=\"btn btn-primary px-3\">Reserve</button> </a> </td>";
            echo "</tr>";
        }
        echo ' </table>
    </div>
        ';
        (new Footer())->render();
    }
}
