<body id="form-body">
<form action="" method="POST" enctype="multipart/form-data" class="registration-form">

    <div class="input-group f-input">
        <span class="input-group-text">Imię</span>
        <input type="text" name="firstName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" pattern="[a-zA-Z]{1,}" required>
    </div>
    <div class="input-group f-input">
        <span class="input-group-text">Nazwisko</span>
        <input type="text" name="lastName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" pattern="[a-zA-Z]{1,}" required>
    </div>
    <div class="input-group f-input">
        <span class="input-group-text">Nazwa Użytkownika</span>
        <input type="text" name="nickName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" pattern="[a-zA-Z0-9]{1,}" required>
    </div>
    <div class="input-group f-input">
        <span class="input-group-text">Adres Email</span>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <div class="input-group f-input">
        <span class="input-group-text">Hasło</span>
        <input type="password" name="password1" class="form-control" id="exampleInputPassword1" required>
    </div>
    <div class="input-group f-input">
        <span class="input-group-text">Powtórz Hasło</span>
        <input type="password" name="password2" class="form-control" id="exampleInputPassword1" required>
    </div>
    <button type="submit" class="btn btn-info">Zarejestruj</button>
</form>
</body>