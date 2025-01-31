<?php
require_once 'database.php';

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // Function to check if an email is already registered
    public function emailExists($email) {
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    // Function to register a new user
    public function register($name, $email, $password) {
        if ($this->emailExists($email)) {
            return "This email is already registered.";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO users (name, email, password, is_admin) VALUES (:name, :email, :password, 0)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            return "Registration successful. You can now <a href='login.php'>log in</a>.";
        } else {
            return "Error registering user.";
        }
    }

    // Function to authenticate user login
    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT id, name, password, is_admin FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if the password is correct
            if (password_verify($password, $userData['password'])) {
                return $userData;
            } else {
                return "Invalid password.";
            }
        } else {
            return "No user found with that email.";
        }
    }
}
?>
