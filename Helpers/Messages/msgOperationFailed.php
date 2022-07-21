<?php
if (isset($_GET['error']))
{
    if ($_GET['error'] ==='failed')
    {
        echo '<div class="alert alert-danger alert-dismissible fade show text-center" id="failed" role="alert">'.$operationFailedMsg.'</div>';
    }
}