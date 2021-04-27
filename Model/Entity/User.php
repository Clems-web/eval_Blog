<?php

namespace Model\Entity;

class User {

    private ?int $id;
    private ?string $username;
    private ?string $password;
    private ?string $role;

    /**
     * User constructor.
     * @param string|null $username
     * @param string|null $password
     * @param int|null $id
     */
    public function __construct(string $username = null, string $password = null, ?int $id = null, string $role = null) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }


    /**
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string|null $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

}