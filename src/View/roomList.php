<?php
    use Room\Model\RoomModel;
    use Room\Repository\RoomRepository;
    use Controller\Room\DeleteRoomController;

    $roomRepository     = new RoomRepository();
    $rooms              = $roomRepository->getAllRooms();

    if (isset($_POST['id'])) {
        (new DeleteRoomController())->request();
    }
?>
<h2 class="text-center">List of available Rooms</h2>

<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Room ID:</th>
      <th scope="col">Room name:</th>
      <th scope="col">Floor:</th>
      <th scope="col">Action:</th>
    </tr>
  </thead>
  <tbody>
      <?php
          foreach ($rooms as $r) {
              if (!$r instanceof RoomModel) {
                  die();
              }

              $roomId = $r->getId();
              $name   = $r->getName();
              $floor  = $r->getFloor();

              echo "<tr>";
              echo "<td>".$roomId."</td>";
              echo "<td>".$name."</td>";
              echo "<td>".$floor."</td>";
              echo "<td>
                        <form method='GET' action='./reservation.php'>
                            <input type='hidden' name='roomId' value='".$roomId."'>
                            <input type='hidden' name='name' value='".$name."'>
                            <button class='btn btn-primary'>Reserve</button>
                        </form>
                        <form method='POST' action='./index.php'>
                            <input type='hidden' name='id' value='".$roomId."'>
                            <button class='btn btn-danger'>Delete</button>
                        </form>
                        </td>";
              echo "</tr>";
          }
      ?>
  </tbody>
</table>