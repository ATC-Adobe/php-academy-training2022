<?php

declare(strict_types=1);

session_start();

use Controller\RegisterController;
use Repository\RegisterFormValidation;
use Service\ValidationMessages;

include_once "../autoloading.php";

$error = '';
$firstName = '';
$lastName = '';
$login = '';
$email = '';
$password = '';
$confirmPassword = '';

if (isset($_POST['submit'])) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    [$error, $firstName, $lastName, $login, $email, $password, $confirmPassword] = (new RegisterController(
        $firstName, $lastName, $login, $email, $password, $confirmPassword
    ))->registerUser(
        $error,
        $firstName,
        $lastName,
        $login,
        $email,
        $password,
        $confirmPassword
    );
}

include_once "../Layout/head.php";
include_once "../Layout/navbar.php";

?>

<div class="d-flex align-items-center justify-content-center" style="margin-top: 30px">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">BookMyRoom Crete new account</div>
            <div class="card-body">
                <form method="post" action="">
                    <p class="text-danger"><?php
                        echo $error; ?></p>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First name"
                               value="<?php
                               echo $firstName; ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last name"
                               value="<?php
                               echo $lastName; ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="login" class="form-label">Login</label>
                        <input type="text" name="login" id="login" class="form-control" placeholder="Login" value="<?php
                        echo $login; ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php
                        echo $email; ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                               placeholder="Password"/>
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password" class="form-label">Confirm password</label>
                        <input type="password" name="confirm-password" id="confirm-password" class="form-control"
                               placeholder="Confirm password"/>
                    </div>
                    <div class="modal-footer">
                        <a href="login.php" type="button" class="btn btn-sm btn-outline-success">Already have account?
                            Go to login</a>
                        <a href="../index.php" type="button" class="btn btn-sm btn-outline-secondary">Cancel</a>
                        <button type="submit" name="submit" class="btn btn-sm btn-outline-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
