<?php
    use Controller\AddReservationController;

    if (isset($_POST['roomId']) &&
        isset($_POST['firstName']) &&
        isset($_POST['lastName']) &&
        isset($_POST['email']) &&
        isset($_POST['startDate']) &&
        isset($_POST['endDate'])
    ) {
        (new AddReservationController())->request();
    }

?>

    <div id="content">

        <div id="reservation">

            <form method="POST" action="./reservation.php" class="form-default">
                <?php

                if (isset($_GET['roomId']) && isset($_GET['name'])) {
                    $roomId = $_GET['roomId'];

                    echo "<h2>Reserve " . $_GET['name'] . "</h2>";
                    echo "<input type='hidden' name='roomId' value='".$roomId."'>";
                } else {
                    die('[Error] you need to choose a room!');
                }
                ?>
                <div class="form-label">
                    <label>First name </label>
                </div>
                <div class="form-input">
                    <label><input type="text" name="firstName" placeholder="John" required/></label>
                </div>
                <div class="form-label">
                    <label>Second name </label>
                </div>
                <div class="form-input">
                    <label><input type="text" name="lastName" placeholder="Smith" required/></label>
                </div>
                <div class="form-label">
                    <label>Email </label>
                </div>
                <div class="form-input">
                    <label><input type="email" name="email" placeholder="john.smith@domain.com" required/></label>
                </div>
                <div class="form-label">
                    <label>From </label>
                </div>
                <div class="form-input">
                    <label><input type="datetime-local" name="startDate" step="1" required/></label>
                </div>
                <div class="form-label">
                    <label>To </label>
                </div>
                <div class="form-input">
                    <label><input type="datetime-local" name="endDate" step="1" required/></label>
                </div>
                <div class="form-label">
                    <label>Save type </label>
                </div>
                <div class="form-selectt">
                    <label>
                        <select name="action">
                            <option value="db">Save to Database</option>
                            <option value="csv">Save to .CSV file</option>
                            <option value="xml">Save to .XML file [NOT READY]</option>
                            <option value="json">Save to .JSON file [NOT READY]</option>
                        </select>
                    </label>
                </div>
                <div class="form-checkbox">
                    <label><input type="checkbox" name="policy" required/><span class="checkbox-text">I accept the <a href="#">terms and conditions</a> of the reservation.</span></label>
                </div>
                <div class="form-button">
                    <button type="submit" class="btn-submit">Submit</button>
                </div>
            </form>

        </div>

    </div>
