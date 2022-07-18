<?php
    use Controller\User\RegisterController;

    if (isset($_POST['username']) &&
        isset($_POST['firstname']) &&
        isset($_POST['lastname']) &&
        isset($_POST['email']) &&
        isset($_POST['password'])
    ) {
        (new RegisterController())->request();
    }
?>

    <h2 class="text-center">Register a new account</h2>
    <form method="POST" action="./register.php">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" placeholder="JohnSmith" id="username" required />
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">First name</label>
            <input type="text" class="form-control" name="firstname" placeholder="John" id="firstname" required/>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Second name</label>
            <input type="text" class="form-control" name="lastname" placeholder="Smith" id="lastname" required/>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="john.smith@domain.com" id="email" required/>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="password" id="password" required/>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>