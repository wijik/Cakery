<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'avatar', 'email', 'password', 'salt', 'created_date', 'created_by', 'updated_date', 'updated_by'];
    // protected $returnType = 'App\Entities\User';
    protected $useTimestamps = false;

    public function insert_user($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
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
    public function last()
    {
        $sql = "SELECT * FROM `user`  ORDER BY `id` DESC limit 1";
        $query = $this->db->query($sql);
        $array = $query->getResultArray();
        return $array;
    }
}
