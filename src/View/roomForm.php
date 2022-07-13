<div id="content">

<?php
    require_once "./src/Controller/AddRoomController.php";
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