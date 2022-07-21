<?php

namespace View\CompositeComponents\ConcreteNodes\GeneralPurposeNodes;

use System\Status;
use View\CompositeComponents\LeafNode;

class StatusLeaf extends LeafNode {
    public function draw() {
        if(isset($_GET['status'])) {
            $this->gen(intval($_GET['status']));
        }
        elseif(isset($_POST['status'])) {
            $this->gen(intval($_POST['status']));
        }
    }

    private function gen(int $code) {
        [ $status, $message ] =
            Status::getString($code);

        echo '<div class="'.$status.'">';
        echo $message;
        echo '</div>';

        echo '<br><br>';
    }
}