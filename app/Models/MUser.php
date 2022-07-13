<?php

namespace App\Models;

use CodeIgniter\Model;

class MUser extends Model
{
    protected $table = 'msuser as m';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getUsers($search)
    {
        return $this->builder
            ->where("m.name like '%" . $search . "%'")
            ->get()->getResultArray();
    }

    public function cek($username)
    {
        return $this->builder
            ->where('m.username', $username)
            ->get()->getRowArray();
    }

    public function getAll()
    {
        return $this->builder
            ->get()->getResultArray();
    }
}
