<?php

namespace App\View\Component;

class FormField implements \Component
{
    public function __construct(protected string $label, protected string $name, protected string $type = "text", protected bool $required = true)
    {
    }

    public function render(string $msg = "", string $value = ""): void {
        echo '
            <div class="col col-lg-6">
                <label class="d-flex justify-content-between"> ';
            echo $this->label;
                if($msg !== "") {
                    echo "<p class='error'>$msg</p>";
                }
            echo '<input '. ($this->required ? " required " : " ") . ' class="myInput" type="' .$this->type.'" name="'
                .$this->name.'" '. ($value ? "value=$value" : " " ).' />
                </label>
            </div>
        ';
    }
}