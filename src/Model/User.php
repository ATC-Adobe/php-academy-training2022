<?php

namespace App\Model;

class User implements \ModelInterface
{
    public int $id;
    public string $first_name;
    public string $last_name;
    public string $nickname;
    public string $email;
    public string $password;
    public function fromArray(array $user): static
    {
        foreach ($user as $key => $value) {
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
        return $this;
    }

    public function toArray(): array
    {
        $result = (array) $this;
//        $result["password"] = "";
        return $result;
    }
}