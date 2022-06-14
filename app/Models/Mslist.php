<?php

namespace App\Models;

use CodeIgniter\Model;

class Mslist extends Model
{
    protected $table = 'mstasklist as l';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }
}
