<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content/>
    <meta name="author" content/>
    <title>Modern Business - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../layout/bootstrap-4.1.3-dist/css/bootstrap.css" rel="stylesheet"/>
</head>
<body class="d-flex flex-column">
<main class="flex-shrink-0">
    <!-- Navigation-->
    <?php require_once '../layout/layout.php' ?>
    <!-- Page content-->
    <section class="py-5">
        <div class="container px-5">
            <!-- Contact form-->
            <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">Fill in this form to register </h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form method="post" action="../Controller/AuthenticationController.php" enctype="multipart/form-data">
                            <!-- Nickname input-->
                            <input type="hidden" name="authentication" value="registration">
                            <div class="form-floating mb-3">
                                <input class="form-control" name="nickname" type="text" placeholder="Enter your nickname..."
                                       data-sb-validations="required"/>
                                <label for="nickname">Nickname</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A nickname is required.</div>
                            </div>
                            <!-- Email input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" type="text" placeholder="Enter your email..."
                                       data-sb-validations="required"/>
                                <label for="email">Email</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">An email is required.</div>
                            </div>
                            <!-- Password input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="password" type="text" placeholder="Enter your password..."
                                       data-sb-validations="required"/>
                                <label for="password">Password</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A password is required.</div>
                            </div>
                            <!-- Password confirmation input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="password_confirmation" type="text" placeholder="Confirm your password..."
                                       data-sb-validations="required"/>
                                <label for="password_confirmation">Password</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A password confirmation is required.</div>
                            </div>
                            <!-- Submit Button-->
                            <div class="text-center">
                                <input class="btn btn-primary" type="submit" value="Zarejestruj się"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>
<!-- Footer-->
<footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto">
                <div class="small m-0 text-white">Copyright &copy; Your Website 2021</div>
            </div>
            <div class="col-auto">
                <a class="link-light small" href="#!">Privacy</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Terms</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Contact</a>
            </div>
        </div>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>




