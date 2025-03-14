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

    public function addRoom($name, $price, $status) {
        $stmt = $this->db->conn->prepare("INSERT INTO rooms (name, price, status) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $price, $status]);
    }

    public function updateRoom($id, $name, $price, $status) {
        $stmt = $this->db->conn->prepare("UPDATE rooms SET name = ?, price = ?, status = ? WHERE id = ?");
        return $stmt->execute([$name, $price, $status, $id]);
    }

    public function deleteRoom($id) {
        $stmt = $this->db->conn->prepare("DELETE FROM rooms WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
