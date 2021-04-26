<?php

namespace Model\Manager;

use Model\DB;
use Model\Entity\User;
use Model\Manager\Traits\ManagerTrait;

class UserManager {

    use ManagerTrait;

    /**
     * Retourne un utilisateur via son id.
     * @param int $id
     * @return User
     */
    public function getById(int $id): User {
        $user = new User();
        $request = DB::getInstance()->prepare("SELECT id, username FROM user WHERE id = :user_fk");
        $request->bindValue(':user_fk', $id);
        $result = $request->execute();
        if($result) {
            $user_data = $request->fetch();
            if($user_data) {
                $user->setId($user_data['id']);
                $user->setPassword('');
                $user->setUsername($user_data['username']);
            }
        }
        return $user;
    }

    /**
     * Return user by logs
     * @param string $name
     * @param $pass
     * @return User|string
     */
    public function getUser(string $name, $pass) {

        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE username = :name");
        $request->bindValue(':name', $name);
        if($request->execute()) {
            $user_data = $request->fetch();
            if($user_data && $user_data['password'] === $pass) {
                $user = new User();
                $user->setId($user_data['id']);
                $user->setPassword($pass);
                $user->setUsername($name);

                return $user;
            }
        }
        return "test";
    }
}