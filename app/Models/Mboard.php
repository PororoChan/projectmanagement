<?php

namespace App\Models;

use CodeIgniter\Model;

class Mboard extends Model
{
    protected $table = 'msboard as b';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAll()
    {
        return $this->builder
            ->get()->getResultArray();
    }

    public function getOne($boardid = 0)
    {
        return $this->builder
            ->where('boardid', $boardid)
            ->get()->getRowArray();
    }

    public function count()
    {
        return $this->builder->countAll();
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }

    public function edit($data, $id)
    {
        return $this->builder->update($data, ['boardid' => $id]);
    }

    public function hapus($id)
    {
        return $this->builder->delete(['boardid' => $id]);
    }
}
