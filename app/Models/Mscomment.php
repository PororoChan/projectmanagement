<?php

namespace App\Models;

use CodeIgniter\Model;

class Mscomment extends Model
{
    protected $table = 'mscomment as s';

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function comCount($taskid = '')
    {
        return $this->builder
            ->where('s.taskid', $taskid)
            ->countAll();
    }

    public function getComment($taskid = '')
    {
        return $this->builder
            ->where('s.taskid', $taskid)
            ->where('s.headerid', null)
            ->orderBy('s.commentid', 'desc')
            ->get()->getResultArray();
    }

    public function getReply($hid = '')
    {
        return $this->builder->distinct()
            ->select('s.commentid, s.taskid, s.message, s.userid, s.headerid, s.createdby, c.headerid as hid')
            ->join('mscomment as c', 's.headerid = c.headerid')
            ->where('s.headerid', $hid)
            ->get()->getResultArray();
    }

    public function tambah($data)
    {
        return $this->builder->insert($data);
    }

    public function edit($data, $id)
    {
        return $this->builder->update($data, ['commentid' => $id]);
    }

    public function hapus($id)
    {
        return $this->builder->delete(['commentid' => $id]);
    }
}
