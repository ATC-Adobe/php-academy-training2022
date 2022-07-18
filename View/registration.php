<?php

declare(strict_types=1);

include "../autoloading.php";
include "../Layout/head.php";
include "../Layout/navbar.php";


?>

<div class="d-flex align-items-center justify-content-center" style="margin-top: 30px">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">bookMyRoom Crete new account</div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="firstname" class="form-label"></label>
                        <input type="text" name="firstName" id="firstname" class="form-control" placeholder="First name"/>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label"></label>
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last name"/>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"></label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="modal-footer">
                        <a href="login.php" type="button" class="btn btn-sm btn-outline-success">Already have account? Go to login.</a>
                        <a href="../index.php" type="button" class="btn btn-sm btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-outline-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
