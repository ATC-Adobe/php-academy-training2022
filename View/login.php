<?php

declare(strict_types=1);

include "../autoloading.php";
include "../Layout/head.php";
include "../Layout/navbar.php";

?>

<div class="d-flex align-items-center justify-content-center" style="margin-top: 30px">
    <div class="col-md-4">
      <dic class="card">
            <div class="card-header">BookMyRoom login</div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label"></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email"/>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label"></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="modal-footer row">
                        <a href="../index.php" type="button" class="btn btn-sm btn-outline-secondary">Cancel</a>
                        <a href="registration.php" type="button" class="btn btn-sm btn-outline-primary">Don't have an account? Sign in.</a>
                        <button type="submit" class="btn btn-sm btn-outline-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
