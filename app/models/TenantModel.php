<?php
require_once __DIR__ . '/BaseModel.php';

class Tenant extends BaseModel
{
    protected $table = 'tenants';

    public function getAllTenants()
    {
        return $this->getAll($this->table);
    }

    public function getTenantById($id)
    {
        return $this->findById($this->table, $id);
    }

    public function createTenant($data)
    {
        return $this->insert($this->table, $data);
    }

    public function updateTenant($id, $data)
    {
        return $this->update($this->table, $data, $id);
    }

    public function deleteTenant($id)
    {
        return $this->delete($this->table, $id);
    }
}

?>
