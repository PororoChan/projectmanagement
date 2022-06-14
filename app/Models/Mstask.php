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

    public function getOne($boardid)
    {
        return $this->builder
            ->where('t.boardid', $boardid)
            ->get()->getRowArray();
    }

    public function getTask($boardid)
    {
        return $this->builder
            ->where('t.boardid', $boardid)
            ->get()->getResultArray();
    }
}
