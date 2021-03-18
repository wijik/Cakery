<?php

namespace App\Models;

use CodeIgniter\Model;

class BahanModel extends Model
{
    protected $table = 'bahan_kue';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'nama_barang', 'gambar', 'deskripsi', 'harga', 'stok', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getBarang($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getProduct($id)
    {
        return $this->db->table($this->table)->where('id', $id)->get()->getRowArray();
    }

    public function searchId($slug)
    {
        $query = "SELECT id FROM bahan_kue WHERE slug = '$slug'";
        return $this->db->query($query)->getRowArray();
    }

    public function getbahan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    // public function category($id = false)
    // {
    //     $modelKue = new \App\Models\KueModel();
    //     if ($id == false) {
    //         return $this->findAll();
    //     }
    //     return $this->where(['id_jenis_kue' => $id])->findAll();
    // }

    public function insert_bahan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function update_bahan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function stok($kurang, $id_barang)
    {
        return $this->db->table($this->table)->update(['stok' => $kurang], ['id' => $id_barang]);
    }

    public function select($id)
    {
        $sql = "Select * from bahan_kue where id = $id";
        $query = $this->db->query($sql);
        $array = $query->getResultArray();
        return $array;
    }

    public function ambil($column, $id)
    {
        $sql = "Select `$column` from bahan_kue where id = $id";
        $query = $this->db->query($sql);
        $array = $query->getResultArray();
        return $array;
    }

    public function search($keyword)
    {
        // $builder = $this->table('pasien');
        // $builder->like('Nama_Pasien', $keyword);
        // return $builder;

        return $this->table('bahan_kue')->like('nama_barang', $keyword)->orLike('deskripsi', $keyword);
    }
}
