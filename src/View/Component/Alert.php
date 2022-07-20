<?php

namespace App\View\Component;

class Alert implements \Component
{
    public function __construct(protected string $msg = "", protected string $type = "danger")
    {
    }

    public function render(): void {
        echo '
        <div class="my-4 text-center alert alert-'. $this->type .' role="alert">'.
  $this->msg .
    '</div>';
    }
}