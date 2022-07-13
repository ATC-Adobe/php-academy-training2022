<div id="content">

<?php
    if (isset($_POST['name']) && isset($_POST['floor'])) {
        try {
            $request = new Controller\AddRoomController();
            $request->addRoom();
            header("Location: ./room.php?confirmed=true");
        } catch (Exception $e) {
            header("Location: ./room.php?confirmed=false");
        }
    }

    if (isset($_GET['confirmed'])) {
        if ($_GET['confirmed'] === 'true') {
            echo "<h2 class='confirm'>Room added successfully.</h2>";
        } else {
            echo "<h2 class='confirm'>Something went wrong while adding room.</h2>";
        }
    }
?>

        <div id="addroom">

            <h2 class="text-light">Add new room</h2>
            <form method="POST" action="./room.php" class="form-default">
                <div class="form-label">
                    <label>Room name </label>
                </div>
                <div class="form-input">
                    <label><input type="text" name="name" placeholder="Room 8" required/></label>
                </div>
                <div class="form-label">
                    <label>Room floor </label>
                </div>
                <div class="form-input">
                    <label><input type="number" name="floor" placeholder="5" required/></label>
                </div>
                <div class="form-button">
                    <button type="submit" class="btn-submit">Submit</button>
                </div>
            </form>

        </div>

</div>