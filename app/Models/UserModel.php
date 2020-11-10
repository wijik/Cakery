<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'avatar', 'email', 'password', 'salt', 'created_date', 'created_by', 'updated_date', 'updated_by'];
    protected $useTimestamps = false;
    protected $createdField = 'created_date';
    protected $updatedField = 'updated_date';
    public function getAdmin()
    {
        return $this->where(['id' => 14])->first();
    }
    public function update_user($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
    public function update_admin($data)
    {
        return $this->db->table($this->table)->update($data, ['id' => 14]);
    }
}
