<div id="content">

    <div class="small-form">
        <h2 class="text-light">Login to your account</h2>

        <form method="POST" action="./login.php" class="form-default">
            <div class="form-label">
                <label>Nickname </label>
            </div>
            <div class="form-input">
                <label><input type="text" name="nickname" placeholder="JohnSmith" required/></label>
            </div>
            <div class="form-label">
                <label>Password </label>
            </div>
            <div class="form-input">
                <label><input type="password" name="password" placeholder="Password" required/></label>
            </div>
            <div class="form-checkbox">
                <label><span class="checkbox-text">Still haven't account? Just register <a href="./register.php">here</a>.</span></label>
            </div>
            <div class="form-button">
                <button type="submit" class="btn-submit">Login</button>
            </div>
        </form>

    </div>

</div>