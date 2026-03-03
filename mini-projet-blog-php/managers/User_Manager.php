<?php

class UserManager extends AbstractManager
{
    public function __construct()
    {
        return parent::__construct();
    }

    public function findAll(): array
    {
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $usersData = $query->fetchAll(PDO::FETCH_ASSOC);

        $users = [];

        foreach ($usersData as $data) {
            $user = new User(
                $data['username'],
                $data['email'],
                $data['password'],
                $data['role']
            );
            $user->setId($data['id']);
            $users[] = $user;
        }
        return $users;
    }



    public function findOne(int $id): ?User
    {
        $query = $this->db->prepare('SELECT * FROM users WHERE id  = :id');
        $query->execute(['id' => $id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $user = new user(
                $data['username'],
                $data['email'],
                $data['password'],
                $data['role']
            );
            $user->setId($data['id']);
            return $user;
        }
        return null;
    }


    public function create(User $user): void
    {
        $query = $this->db->prepare('insert INTO users(username, email, password,role) VALUES (:username, :email, :password, :role');
        $query->execute([
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()
        ]);
        $id = $this->db->lastInsertId();
        $user->setId($id);
        }

    public function update(User $user) : void {
        $query = $this->db->prepare('UPDATE users SET username = :username, email = :email, password = :password , role=:role where id= :id ');
        $query->execute([
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole(),
            'id' => $user->getId()
        ]);
    }


    public function delete(int $id) : void {
        $query = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $query->execute(['id' => $id]);
        
    }
}
