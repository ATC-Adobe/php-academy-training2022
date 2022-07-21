<?php

declare(strict_types=1);

use Controller\LogoutController;

require_once '../autoloading.php';

$logout = new LogoutController();
$logout->logout();

exit();