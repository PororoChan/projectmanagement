<?php

namespace App\Models;

use CodeIgniter\Model;

class Msboardshare extends Model
{
    protected $table = 'msboardshare as bs';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getBoard($user)
    {
        return $this->builder
            ->where("bs.sharedto", $user)
            ->get()->getResultArray();
    }

    public function getRoles($user, $boardid)
    {
        return $this->builder
            ->where("bs.sharedto", $user)
            ->where("bs.boardid", $boardid)
            ->get()->getRowArray();
    }

    public function getCount($userid)
    {
        return $this->builder
            ->where("bs.sharedto", $userid)
            ->countAllResults();
    }

    public function addBoard($data)
    {
        return $this->builder->insert($data);
    }

    public function hapus($id)
    {
        return $this->builder->delete(['bs.boardid' => $id]);
    }
}
