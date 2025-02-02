<?php
require_once 'Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        try {
            $stmt = $this->db->getConnection()->prepare("INSERT INTO users (name, email, password, is_admin) VALUES (?, ?, ?, 0)");
            $stmt->execute([$name, $email, $hashedPassword]);

            return "Registration successful. You can now <a href='login.php'>log in</a>.";
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function login($email, $password) {
        try {
            $stmt = $this->db->getConnection()->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                return $user;
            } else {
                return "Invalid email or password.";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>
