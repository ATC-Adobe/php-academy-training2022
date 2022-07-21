<?php

declare(strict_types=1);
session_start();

use Controller\LoginController;

include "../autoloading.php";

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    (new LoginController($login, $password,))->loginUser();

    $login = new LoginController($login, $password);
    $login->loginUser();
}
include "../Layout/head.php";
include "../Layout/navbar.php";
?>
<body>
<div class="d-flex align-items-center justify-content-center" style="margin-top: 30px">
    <div class="col-md-4">
        <?php
        if (isset($_SESSION['error'])) {
            ?>
            <div class="alert alert-danger" role="alert" id="error">
                <?php
                echo $_SESSION['error']; ?>
            </div>
            <?php
            unset ($_SESSION['error']);
        }
        ?>
        <div class="card">
            <div class="card-header">BookMyRoom login</div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="login" class="form-label"></label>
                        <input type="text" name="login" id="login" class="form-control" placeholder="Login"/>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"></label>
                        <input type="password" name="password" id="password" class="form-control"
                               placeholder="Password"/>
                    </div>
                    <div class="modal-footer row">
                        <a href="../index.php" type="button" class="btn btn-sm btn-outline-secondary">Cancel</a>
                        <a href="register.php" type="button" class="btn btn-sm btn-outline-primary">Don't have an
                            account? Sign in.</a>
                        <button type="submit" name="submit" class="btn btn-sm btn-outline-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include "../Layout/footer.php";
    ?>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            $("#error").remove();
        }, 5000);
    });
</script>
