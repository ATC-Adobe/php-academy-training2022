<div class="sticky">
    <div class="inner-sticky">
        <a href = "/">Menu</a>
        <a href = "/room/list">Room reservation</a>
        <a href = "/room/add">Add room</a>
        <a href = "/reservation/list">Reservations</a>

        <?php

            $sess = \System\Util\Session::getInstance();

            if($sess->isValid()) {
                echo '<a href = "/user/logout">Log out</a>';
                echo 'Logged as: <a href="/reservation/user">'
                    .htmlspecialchars($sess->get('username')).'</a>';
            }
            else {
                echo '<a href = "/user/add">Sign in</a>';
                echo '<a href = "/user/login">Log in</a>';
            }
        ?>
    </div>
</div>