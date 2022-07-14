<?php

namespace App\View;

use App\View\Component\Footer;
use App\View\Component\Header;
use App\View\Component\Navbar;
use Component;

class Show404 implements Component
{
    public function render(): void
    {
        (new Header())->render("Page not found");
        (new Navbar())->render();
        echo "<div class='container mt-3 text-center'>";
        echo "<h1>Couldn't find a page!</h1><br>";
        echo '<a href="/">Go to home page</a>';
        echo "</div>";
        (new Footer())->render();
    }
}