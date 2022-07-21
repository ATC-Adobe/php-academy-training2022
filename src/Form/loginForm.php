<h2 class="text-center">Login to your account</h2>
<form method="POST" action="./login.php">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" placeholder="JohnSmith" id="username" required />
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" placeholder="password" id="password" required/>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>