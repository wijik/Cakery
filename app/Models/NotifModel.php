<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifModel extends Model
{
    protected $table = 'notif';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_user', 'deskripsi', 'created_date', 'created_by', 'updated_date', 'updated_by'
    ];
    protected $useTimestamps = false;
    protected $createdField = 'created_date';
    protected $updatedField = 'updated_date';
}
