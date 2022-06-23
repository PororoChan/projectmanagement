<?php

namespace App\Models;

use CodeIgniter\Model;

class Mscomment extends Model
{
    protected $table = 'mscomment';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function comCount($taskid = '')
    {
        return $this->builder
            ->where('taskid', $taskid)
            ->countAll();
    }

    public function getComment($taskid = '')
    {
        return $this->builder
            ->where('taskid', $taskid)
            ->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }
}
