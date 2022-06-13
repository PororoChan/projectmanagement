<?php

namespace App\Models;

use CodeIgniter\Model;

class Mlist extends Model
{
    protected $table = 'mstasktitle as t';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getTitle($user)
    {
        return $this->builder
            ->where('createdby', $user)
            ->get()->getResultArray();
    }

    public function getOne($id = '')
    {
        $x = $this->builder;

        if ($id != '') {
            $x->where('titleid', $id);
        }

        return $x->get()->getRowArray();
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }

    public function edit($data, $id)
    {
        return $this->builder->update($data, ['titleid' => $id]);
    }

    public function hapus($id)
    {
        return $this->builder->delete(['titleid' => $id]);
    }
}
