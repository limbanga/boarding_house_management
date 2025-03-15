<?php
require_once __DIR__ . '/../core/Database.php';

class BaseModel
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Phương thức thực thi câu lệnh SQL
    protected function query($sql, $params = [])
    {
        $stmt = $this->db->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    // Lấy tất cả dữ liệu từ bảng
    public function getAll($table)
    {
        return $this->query("SELECT * FROM $table")->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tìm một bản ghi theo ID
    public function findById($table, $id)
    {
        return $this->query("SELECT * FROM $table WHERE id = ?", [$id])->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm mới một bản ghi
    public function insert($table, $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $values = array_values($data);

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        return $this->query($sql, $values);
    }

    // Cập nhật một bản ghi theo ID
    public function update($table, $data, $id)
    {
        $columns = implode(" = ?, ", array_keys($data)) . " = ?";
        $values = array_values($data);
        $values[] = $id;

        $sql = "UPDATE $table SET $columns WHERE id = ?";
        return $this->query($sql, $values);
    }

    // Xóa một bản ghi theo ID
    public function delete($table, $id)
    {
        return $this->query("DELETE FROM $table WHERE id = ?", [$id]);
    }
}

?>
