<?php
    $firstname  = $session->get('firstname');
    $lastname   = $session->get('lastname');
    $email      = $session->get('email');
?>
    <form method="POST" action="./reservation.php">
        <?php
            echo $input;
        ?>
        <div class="mb-3">
            <label for="firstName" class="form-label">First name</label>
            <input type="text" class="form-control" name="firstName" value="<?php echo $firstname ?>" id="firstName" readonly />
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Second name</label>
            <input type="text" class="form-control" name="lastName" value="<?php echo $lastname ?>" id="lastName" readonly/>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="<?php echo $email ?>" id="email" readonly/>
        </div>
        <div class="mb-3">
            <label for="date-from" class="form-label">From</label>
            <input type="datetime-local" class="form-control" name="startDate" step="1" id="date-from" required/>
        </div>
        <div class="mb-3">
            <label for="date-to" class="form-label">To</label>
            <input type="datetime-local" class="form-control" name="endDate" step="1" id="date-to" required/>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>