<?php

namespace App\Models;

use CodeIgniter\Model;

class Mstasklist extends Model
{
    protected $table = 'mstasklist as s';
    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAll($taskid)
    {
        return $this->builder
            ->where('s.taskid', $taskid)
            ->get()->getResultArray();
    }

    public function getOne($id)
    {
        return $this->builder
            ->where('s.id', $id)
            ->get()->getRowArray();
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }

    public function hapus($id)
    {
        return $this->builder->delete(['taskid' => $id]);
    }
}
