<?php
if (isset($_GET['success']))
{
    if ($_GET['success'] ==='loginsuccess')
    {
        echo '<div class="alert alert-success alert-dismissible fade show text-center" id="loginSuccess" role="alert">'.$loginSuccessMsg.'</div>';
    }
}