<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $allowedFields = ['UserId', 'Nama', 'Alamat', 'Telepon', 'Jenis_Kelamin'];
    // protected $returnType = 'App\Entities\User';
    protected $useTimestamps = false;

    public function cari($id)
    {
        $query = "SELECT * FROM customer WHERE UserId = '$id'";
        return $this->db->query($query)->getRowArray();
    }
    public function update_customer($update, $id_customer)
    {
        return $this->db->table($this->table)->update($update, ['id' => $id_customer]);
    }
}
