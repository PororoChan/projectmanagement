<?php

namespace App\Models;

use CodeIgniter\Model;

class Mboard extends Model
{
    protected $table = 'mstasklist as t';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAll()
    {
        return $this->builder;
    }

    public function getEachList($sts, $name)
    {
        return $this->builder
            ->where('createdby', $name)
            ->where('taskstatus', $sts)
            ->get()->getResultArray();
    }

    public function switchSts($data, $id)
    {
        return $this->builder->update(['taskstatus' => $data], ['taskcode' => $id]);
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }
}
