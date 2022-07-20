<?php
session_start();
var_dump($_SESSION);

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
                    <h1 class="fw-bolder">Your room id is <?php echo $_GET['room_id']; ?>. Fill in this form to reserve
                        it </h1>
                    <p class="lead fw-normal text-muted mb-0">We need some information from you</p>
                    <?php if (isset($_SESSION['error_date'])) { ?>
                        <div class="alert-danger"><?php echo $_SESSION['error_date'] ?></div>
                    <?php } ?>
                    <?php if (isset($_SESSION['error_room'])) { ?>
                        <div class="alert-danger"><?php echo $_SESSION['error_room'] ?></div>
                    <?php } ?>
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
                        <form method="post" action="../Repository/Strategy.php" enctype="multipart/form-data">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input type="hidden" name="delete" value="false">
                                <input type="hidden" name="room_id" value="<?= $_GET['room_id'] ?>">
                                <input class="form-control" name="firstname" type="text"
                                       placeholder="Enter your name..."
                                       data-sb-validations="required"/>
                                <label for="name">First Name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Surname input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="lastname" type="text"
                                       placeholder="Enter your surname..."
                                       data-sb-validations="required"/>
                                <label for="name">Last Name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" type="email" placeholder="name@example.com"
                                       data-sb-validations="required,email"/>
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.
                                </div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- From input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="start_date" type="datetime-local"
                                       placeholder="From..."
                                       data-sb-validations="required"/>
                                <label for="name">From</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A date is required.</div>
                            </div>
                            <!-- Till input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="end_date" type="datetime-local" placeholder="Till..."
                                       data-sb-validations="required"/>
                                <label for="name">To</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A date is required.</div>
                            </div>
                            <!-- Submit Buttons-->
                            <div class="text-center d-flex justify-content-around m-2">
                                <input class="btn btn-primary" name="save_id" type="submit"
                                       value="Zapisz w bazie danych"/>
                                <input class="btn btn-primary" name="save_id" type="submit" value="Zapisz w pliku CSV"/>
                            </div>
                            <div class="text-center d-flex justify-content-around">
                                <input class="btn btn-primary" name="save_id" type="submit"
                                       value="Zapisz w pliku JSON"/>
                                <input class="btn btn-primary" name="save_id" type="submit" value="Zapisz w pliku XML"/>
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

