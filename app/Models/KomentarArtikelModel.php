<?php

namespace App\Models;

use CodeIgniter\Model;

class KomentarArtikelModel extends Model
{
    protected $table = 'komentar_artikel';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'id_user', 'id_blog', 'komentar'
    ];
    protected $useTimestamps = false;
    protected $createdField = 'created_date';
    protected $updatedField = 'updated_date';

    public function insert_komentar($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
