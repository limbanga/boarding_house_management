<?php
require_once __DIR__ . '/BaseModel.php';

class UserModel extends BaseModel
{
    protected $table = 'users';

    // Lấy tất cả người dùng
    public function getAllUsers()
    {
        return $this->getAll($this->table);
    }

    // Tìm người dùng theo ID
    public function getUserById($id)
    {
        return $this->findById($this->table, $id);
    }

    // Tìm người dùng theo email
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = ?";
        return $this->query($sql, [$email])->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm người dùng mới
    public function createUser($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        return $this->insert($this->table, $data);
    }

    // Cập nhật thông tin người dùng
    public function updateUser($id, $data)
    {
        return $this->update($this->table, $data, $id);
    }

    // Xóa người dùng
    public function deleteUser($id)
    {
        return $this->delete($this->table, $id);
    }
}
?>
