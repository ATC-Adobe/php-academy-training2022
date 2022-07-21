<?php

namespace View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes;

use System\Util\Session;
use View\CompositeComponents\InternalNode;

class DocumentRootNode extends InternalNode {

    public function __construct(array $children) {
        parent::__construct($children);
    }

    public function draw(): void {
    ?>
        <!DOCTYPE html>
        <html lang="en">
            <head>

                <title>Rooms</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <link rel="stylesheet" type="text/css" href="/layout/css/style.css">

                <!--
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
                -->
            </head>
        <body <?php
            $sess = Session::getInstance();
            $style = intval($sess->get('style'));
            if($style != 0) {
                echo "class='palette$style'";
            }
        ?> >
        <?php
            parent::draw();
        ?>
        </body>
        </html>
        <?php
    }
}