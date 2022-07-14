<?php

namespace App\View\Component;

use Component;

class Header implements Component
{
    public function render(string $title = "Welcome"): void
    {
        echo '
        <!DOCTYPE html>
<html lang="en">
            <head>
    <meta charset="UTF-8">
    <title>'. $title.'</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/src/View/css/style.css">
        </head>
        <body class="background">
        ';
    }
}