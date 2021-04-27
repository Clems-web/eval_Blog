<?php

namespace Model\Manager;

use Model\DB;
use Model\Entity\User;
use Model\Manager\Traits\ManagerTrait;

use PDOException;

class UserManager {

    use ManagerTrait;


    /**
     * Retourne un utilisateur via son id.
     * @param int $id
     * @return User
     */
    public function getById(int $id): User {
        $user = new User();
        $request = DB::getInstance()->prepare("SELECT u.id, u.username, r.title FROM user AS u INNER JOIN role AS r WHERE u.id = :user_fk AND r.id = u.user_role_fk");
        $request->bindValue(':user_fk', $id);
        $result = $request->execute();
        if($result) {
            $user_data = $request->fetch();
            if($user_data) {
                $user->setId($user_data['id']);
                $user->setPassword('');
                $user->setUsername($user_data['username']);
                $user->setRole($user_data['title']);
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
    public function getUser(string $name, string $pass) {

        $request = DB::getInstance()->prepare("SELECT u.id, u.username, u.password, r.title FROM user AS u INNER JOIN role AS r WHERE u.username = :name AND r.id = u.user_role_fk");
        $request->bindValue(':name', $name);
        if($request->execute()) {
            $user_data = $request->fetch();
            if($user_data && $user_data['password'] === $pass) {
                $user = new User();
                $user->setId($user_data['id']);
                $user->setPassword($pass);
                $user->setUsername($name);
                $user->setRole($user_data['title']);

                return $user;
            }
            return "ok";
        }
        return "test";
    }
}