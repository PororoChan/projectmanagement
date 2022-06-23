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

    public function getAll($id)
    {
        return $this->builder
            ->where('s.taskid', $id)
            ->get()->getResultArray();
    }

    public function getOne($id = 0)
    {
        return $this->builder
            ->where('s.id', $id)
            ->get()->getRowArray();
    }

    public function updateList($data, $tid)
    {
        return $this->builder->update($data, ['id' => $tid]);
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }

    public function edit($data, $id)
    {
        return $this->builder->update($data, ['id' => $id]);
    }

    public function hapus($id)
    {
        $this->builder->delete(['id' => $id]);
        $this->db->table('mscomment')->delete(['taskid' => $id]);

        return;
    }
}
