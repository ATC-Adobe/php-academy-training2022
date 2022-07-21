<?php

namespace App\Repository;

use App\Model\User;
use PDO;

class UserRepository extends BaseRepository
{
    protected string $table = "user";
    public function save(User $user): bool
    {
        $statement = $this->connection->prepare(
            "
            INSERT INTO user (first_name, last_name, nickname, email, password) VALUES ( :first_name, :last_name, :nickname, :email, :password);"
        );
        return $statement->execute($user->toArray());
    }
    public function findOne(int $id): User|false
    {
        $data = $this->findOneAssoc($id);
        if(!$data) {
            return false;
        }
        $model = new User();
        $model->fromArray($data);
        return $model;
    }
    public function findByEmail(string $email): User|false
    {
        $statement = $this->connection->prepare("
            SELECT * FROM user WHERE email = :email
        ");
        if(!$statement->execute(["email" => $email])) {
            return false;
        }
        if(!$statement->rowCount()) {
            return false;
        }
        $data = $statement->fetchAll(PDO::FETCH_ASSOC)[0];
        return (new User())->fromArray($data);
    }
}