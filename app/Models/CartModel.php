<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'id_user', 'id_barang', 'jumlah'
    ];
    public function getcart($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_user'])->like($id);
    }
    public function insert_cart($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function update_cart($input, $id)
    {
        return $this->db->table($this->table)->update($input, ['id' => $id]);
    }
    public function select($column, $id)
    {
        $sql = "Select `$column` from cart where id_user = $id";
        $query = $this->db->query($sql);
        $array = $query->getResultArray();
        $arr = array_column($array, "$column");
        return $arr;
    }
}
