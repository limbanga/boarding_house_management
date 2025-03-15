<?php
require_once __DIR__ . '/BaseModel.php';

class RoomModel extends BaseModel
{
    protected $table = "rooms";

    public function getAllRooms()
    {
        return $this->getAll($this->table);
    }

    public function getRoomById($id)
    {
        return $this->findById($this->table, $id);
    }

    public function addRoom($data)
    {
        return $this->insert($this->table, $data);
    }

    public function updateRoom($id, $data)
    {
        return $this->update($this->table, $data, $id);
    }

    public function deleteRoom($id)
    {
        return $this->delete($this->table, $id);
    }
}
?>
