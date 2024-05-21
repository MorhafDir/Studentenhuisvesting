<?php

require_once 'Database.php';

class Employee {
    private $employeeId;
    private $email;
    private $password;
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Method to register an employee
    public function registerEmployee($email, $password, $confirmed_password) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($password !== $confirmed_password) {
                return "Passwords do not match";
            }

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO employee (email, password) VALUES (:email, :password)";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);

            if ($stmt->execute()) {
                header('Location: ../view/index.php');
                return "Registration successful";
            } else {
                return "Error: " . $sql . "<br>" . $this->db->getConnection()->error;
            }
        }
    }

    // Method to log in an employee
    public function loginEmployee($email, $password) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sql = "SELECT * FROM employee WHERE email = :email";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                header('Location: ../view/templates/home.php');
                return "Login successful";
            } else {
                return "Invalid email or password";
            }
        }
    }
}

?>
