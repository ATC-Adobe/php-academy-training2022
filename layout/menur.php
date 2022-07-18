<div class="sticky">
    <div class="inner-sticky">
        <a href = "/">Menu</a>
        <a href = "/roomListing">Room reservation</a>
        <a href = "/roomForm">Add room</a>
        <a href = "/roomReservationListing">Reservations</a>

        <?php

            $sess = \System\Util\Session::getInstance();

            if($sess->isValid()) {
                echo '<a href = "/userLogOut">Log out</a>';
                echo 'Logged as: <a href="/sessinfo">'.$sess->get('username').'</a>';
            }
            else {
                echo '<a href = "/userRegistration">Sign in</a>';
                echo '<a href = "/userLogIn">Log in</a>';
            }
        ?>
    </div>
</div>