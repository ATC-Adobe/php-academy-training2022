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

    /**
     * Uses prefix user_ !!
     * Used for fetching with reservations
     * @param array $user
     * @return $this
     */
    public function fromArrayPrefix(array $user): static
    {
        foreach ($user as $key => $value) {
            if(str_starts_with($key, 'user')) {
                //prefix user_[actual key]
                $this->{substr($key, 5)} = $value;
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
    public function fromArray(array $user): static
    {
        foreach ($user as $key => $value) {
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
        return $this;
    }
}