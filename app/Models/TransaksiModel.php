<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_kue', 'id_pembeli', 'created_date', 'created_by', 'updated_date', 'updated_by', 'total_harga', 'jumlah', 'alamat', 'ongkir'
    ];
    public function insert_trans($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function search($keyword)
    {
        // $builder = $this->table('pasien');
        // $builder->like('Nama_Pasien', $keyword);
        // return $builder;

        return $this->table('transaksi')->like('id_kue', $keyword)->orLike('id_pembeli', $keyword);
    }
}
