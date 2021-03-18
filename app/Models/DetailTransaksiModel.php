<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiModel extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'Id_transaksi', 'id_barang', 'jumlah'
    ];

    public function cari($id_trans)
    {
        return $this->where(['Id_transaksi' => $id_trans])->first();
    }

    public function detail($id)
    {
        $builder = $this->table($this->table)->getWhere(['Id_transaksi' => $id]);
        $query = $builder->getResultArray();
        return $query;
    }

    public function insert_detail($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
