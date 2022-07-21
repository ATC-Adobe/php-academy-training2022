<?php
if (isset($_GET['error']))
{
    if ($_GET['error'] ==='usernotfound')
    {
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" id="userNotFound" role="alert">'.$userNotFoundMsg.'</div>';
    }
}