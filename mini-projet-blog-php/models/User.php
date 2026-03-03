<?php

class User {

private ?int $Id = null;
private DateTime $createdAt;
    public function __construct(private string $username, private string $email, private string $password,
    private int $role)
    {
    $this->createdAt = new DateTime();
    }

    public function getId() : ?int {
        return $this->Id;
    }
    public function setid(int $Id) : void {
        $this->Id = $Id;
    }
    
    public function getUsername() : string {
        return $this->username;
    }
    public function setUsername(string $username) : void {
        $this->username = $username;
    }

    public function getEmail() : string {
        return $this->email;
    }
    public function setEmail(string $email) : void {
        $this->email = $email;
    }

    public function getPassword() : string {
        return $this->password;
    }
    public function setPassword(string $password) : void {
        $this->password = $password;
    }

    public function getRole() : int {
        return $this->role;
    }
    public function setRole(int $role) : void {
        $this->role = $role;
    }

    public function getCreatedAt(): DateTime {
        return $this->createdAt;
    }
    public function setCreatedAt(DateTime $createdAt): void {
        $this->createdAt = $createdAt;
    }


    
}
?>