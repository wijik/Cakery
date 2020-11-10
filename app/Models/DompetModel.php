<?php

namespace App\Models;

use CodeIgniter\Model;

class DompetModel extends Model
{
    protected $table = 'dompet';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'id_user', 'jumlah'
    ];
    public function search($keyword)
    {
        // $builder = $this->table('pasien');
        // $builder->like('Nama_Pasien', $keyword);
        // return $builder;

        return $this->table('dompet')->join('user', 'dompet.id_user = user.id')->like('id_user', $keyword)->orLike('jumlah', $keyword)->orLike('username', $keyword);
    }
    public function insert_dompet($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function update_dompet($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
    public function beli($jumlah_beli, $id_user)
    {
        return $this->db->table($this->table)->update(['jumlah' => $jumlah_beli], ['id_user' => $id_user]);
    }
    public function balik($balik)
    {
        return $this->db->table($this->table)->update(['jumlah' => $balik], ['id_user' => 14]);
    }
    public function select($id)
    {
        $sql = "Select * from dompet where id_user = $id";
        $query = $this->db->query($sql);
        $array = $query->getResultArray();
        return $array;
    }
}
