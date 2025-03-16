<?php
require_once __DIR__ . '/BaseModel.php';

class DormitoryModel extends BaseModel
{
    protected $table = "dormitories";

    public function getAllDormitories()
    {
        return $this->getAll($this->table);
    }

    // public function getRoomById($id)
    // {
    //     return $this->findById($this->table, $id);
    // }

    // public function addRoom($data)
    // {
    //     return $this->insert($this->table, $data);
    // }

    // public function updateRoom($id, $data)
    // {
    //     return $this->update($this->table, $data, $id);
    // }

    // public function deleteRoom($id)
    // {
    //     return $this->delete($this->table, $id);
    // }
}
?>
