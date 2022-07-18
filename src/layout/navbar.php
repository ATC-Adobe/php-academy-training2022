<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
    <div class="container">
        <a class="navbar-brand" href="#">PHPCourse</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./reservationList.php">All reservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./room.php">Add room</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php

                if (isset ($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                            <div class='user'>Hello <span class='username text-center'>".$_SESSION['username']."</span></div>
                        </li>";
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='./logout.php'><button class='btn btn-danger'>Logout</button></a>
                        </li>";
                } else {
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='./register.php'><button class='btn btn-primary'>Register</button></a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./login.php'><button class='btn btn-primary'>Login</button></a>
                        </li>";
                }
                ?>
            </ul>
        </div>
    </div>
</nav>