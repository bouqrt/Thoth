<?php

require_once '../app/core/Database.php';

class Student
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM students WHERE email = :email"
        );
        $stmt->execute(['email' => $email]);

        $student = $stmt->fetch();
        return $student ?: null;
    }

    public function create(string $name, string $email, string $password): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO students (name, email, password)
             VALUES (:name, :email, :password)"
        );

        return $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
    }
}