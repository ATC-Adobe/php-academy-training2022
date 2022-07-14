<div id="content">

<?php
    use Controller\AddRoomController;

    if (isset($_POST['name']) && isset($_POST['floor'])) {
        (new AddRoomController())->request();
    }
?>

        <div class="small-form">
            <h2 class="text-light">Add new room</h2>
            <?php
                if (isset($_GET['confirmed'])) {
                    if ($_GET['confirmed'] === 'true') {
                        echo "<h5 class='confirm'>Room added successfully.</h5>";
                    } else {
                        echo "<h5 class='confirm'>Something went wrong while adding room.</h5>";
                    }
                }
            ?>
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