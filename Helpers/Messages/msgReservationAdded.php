<?php
if (isset($_GET['msg']))
{
    if ($_GET['msg'] =='add')
    {
        echo '<div class="alert alert-success alert-dismissible fade show text-center" id="bookSaved" role="alert">'.$message.'</div>';
    }
}