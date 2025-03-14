<?php
require_once __DIR__ . '/../core/Database.php';

class Room {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllRooms() {
        $stmt = $this->db->conn->prepare("SELECT * FROM rooms");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
