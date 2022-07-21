<?php
if (isset($_GET['error']))
{
    if ($_GET['error'] ==='wrongpassword')
    {
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" id="wrongPassword" role="alert">'.$wrongPasswordMsg.'</div>';
    }
}