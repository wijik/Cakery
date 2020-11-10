<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarModel extends Model
{
    protected $table = 'komentar';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'id_user', 'id_blog', 'id_barang', 'komentar', 'created_by', 'created_date', 'updated_by', 'updated_date'
    ];
    protected $useTimestamps = false;
    protected $createdField = 'created_date';
    protected $updatedField = 'updated_date';

    public function insert_komentar($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
