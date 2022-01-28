<?php

namespace App\Entity;

use Cacofony\BaseClasse\BaseEntity;

class User extends BaseEntity
{
    private string $id;
    private string $email;
    private string $encodedPassword;
    private string $firstName;
    private string $lastName;
    private array $roles = [];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return User
     */
    public function setId(string $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEncodedPassword(): string
    {
        return $this->encodedPassword;
    }

    /**
     * @param string $encodedPassword
     * @return User
     */
    public function setEncodedPassword(string $encodedPassword): User
    {
        $this->encodedPassword = $encodedPassword;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return User
     */
    public function setFirstName(string $firstName): User
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return User
     */
    public function setLastName(string $lastName): User
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';
        return $roles;
    }

    public function getSerializedRoles(): string
    {
        return serialize($this->roles);
    }

    /**
     * @param string $roles
     * @return User
     */
    public function setRoles(?string $roles): User
    {
        if ($roles) {
            $this->roles = unserialize($roles);
        }
        return $this;
    }

    public function isPasswordValid(string $password): bool
    {
        return password_verify($password, $this->encodedPassword);
    }

}