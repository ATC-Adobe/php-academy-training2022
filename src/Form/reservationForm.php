<?php
    use Controller\Reservation\AddReservationController;

    if (isset($_POST['roomId']) &&
        isset($_POST['firstName']) &&
        isset($_POST['lastName']) &&
        isset($_POST['email']) &&
        isset($_POST['startDate']) &&
        isset($_POST['endDate'])
    ) {
        (new AddReservationController())->request();
    }

    if (isset($_GET['roomId']) && isset($_GET['name'])) {
    $roomId = $_GET['roomId'];

    echo "<h2 class='text-center'>Reserve " . $_GET['name'] . "</h2>";
        $input = "<input type='hidden' name='roomId' value='".$roomId."'>";
    } else {
        header ("Location: ./index.php");
        die();
    }
    ?>
    <form method="POST" action="./reservation.php">
        <?php
            echo $input;
        ?>
        <div class="mb-3">
            <label for="firstName" class="form-label">First name</label>
            <input type="text" class="form-control" name="firstName" placeholder="John" id="firstName" required />
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Second name</label>
            <input type="text" class="form-control" name="lastName" placeholder="Smith" id="lastName" required/>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" placeholder="john.smith@domain.com" id="email" required/>
        </div>
        <div class="mb-3">
            <label for="date-from" class="form-label">From</label>
            <input type="datetime-local" class="form-control" name="startDate" step="1" id="date-from" required/>
        </div>
        <div class="mb-3">
            <label for="date-to" class="form-label">To</label>
            <input type="datetime-local" class="form-control" name="endDate" step="1" id="date-to" required/>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
            <label class="form-check-label" for="flexCheckDefault">
                I accept the <a href="#">terms and conditions</a> of the reservation.
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>