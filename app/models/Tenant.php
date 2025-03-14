<?php

require_once __DIR__ . '/../core/Database.php';


class Tenant {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAll() {
        $stmt = $this->db->conn->prepare("SELECT * FROM tenants");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $phone, $email, $room_id, $start_date, $end_date) {
        $stmt = $this->conn->prepare("INSERT INTO tenants (name, phone, email, room_id, start_date, end_date) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $phone, $email, $room_id, $start_date, $end_date]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM tenants WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>


