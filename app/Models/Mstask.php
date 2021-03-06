<?php

namespace App\Models;

use CodeIgniter\Model;

class Mstask extends Model
{
    protected $table = 'mstask as t';

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

    public function getSeq($bid)
    {
        $dt = $this->builder
            ->orderBy('t.seq', 'asc')
            ->where('t.boardid', $bid)
            ->get()->getLastRow();

        if ($dt == null) {
            return 0;
        } else {
            return $dt->seq;
        }
    }

    public function getOne($id = 0)
    {
        return $this->builder
            ->where('t.taskid', $id)
            ->get()->getRowArray();
    }

    public function getTask($boardid)
    {
        return $this->builder
            ->where('t.boardid', $boardid)
            ->orderBy('t.seq', 'asc')
            ->get()->getResultArray();
    }

    public function swap($data, $taskid = 0)
    {
        return $this->builder->update($data, ['taskid' => $taskid]);
    }

    public function reorder($seq, $taskid = 0)
    {
        return $this->builder->update();
    }

    public function addTask($data)
    {
        return $this->builder->insert($data);
    }

    public function edit($data, $id)
    {
        return $this->builder->update($data, ['taskid' => $id]);
    }

    public function hapus($id)
    {
        $this->db->table('mstask')->delete(['taskid' => $id]);
        $this->db->table('mstasklist')->delete(['taskid' => $id]);
        return;
    }
}
