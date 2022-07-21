<?php

namespace App\Controllers\master;

use App\Controllers\BaseController;
use App\Models\Msboardshare;
use App\Models\Mscomment;
use App\Models\Mstask;
use App\Models\Mstasklist;

class Tasks extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->task = new Mstask();
        $this->share = new Msboardshare();
        $this->comment = new Mscomment();
        $this->tasklist = new Mstasklist();
    }

    public function task()
    {
        if (session()->get('id_user') == NULL) {
            return redirect()->to('login');
        }
        $bid = session()->get('idb');
        $query = $this->share->getRoles(session()->get('id_user'), $bid);
        $data = [
            'tasklist' => $this->tasklist,
            'comment' => $this->comment,
            'roles' => (($query != '' ? $query['roles'] : '0')),
            'task' => $this->task->getTask($bid),
            'count' => $this->tasklist,
        ];
        return view('master/task/v_card', $data);
    }

    public function addF()
    {
        return view('master/task/v_add');
    }

    public function FormViews($id = 0)
    {
        $ftype = 'Add';
        if ($id != '') {
            $ftype = 'Edit';
        }
        $data = [
            'id' => $id,
            'form_type' => $ftype,
            'data' => $this->task,
            'row' => $this->task->getOne($id),
        ];
        return view('master/task/V_form_list', $data);
    }

    public function swap()
    {
        $id = $this->request->getPost('tsid');
        $seq['seq'] = $this->request->getPost('seq');

        if ($id != '') {
            $this->task->swap($seq, $id);
            $dt['success'] = 1;
        } else {
            $dt['success'] = 0;
        }
        echo json_encode($dt);
    }

    public function addTask()
    {
        $tasktitle = $this->request->getPost('taskname');
        $boardid = $this->request->getPost('bid');
        if ($tasktitle != '') {
            $data = [
                'taskid' => random_int(100000, 999999),
                'taskname' => $tasktitle,
                'boardid' => $boardid,
                'seq' => intval($this->task->getSeq($boardid)) + 1,
            ];
            $q = $this->task->addTask($data);
            if ($q) {
                $data['success'] = 1;
            } else {
                $data['success'] = 0;
                $msg['msg'] = 'Data not added';
            }
        } else {
            $data['success'] = 0;
            $data['msg'] = 'Listname cannot be empty';
        }
        echo json_encode($data);
    }

    public function editData()
    {
        $id = $this->request->getPost('id');
        $data = $this->request->getPost('dt');
        if ($id != '') {
            $data = [
                'taskname' => $data
            ];
            $this->task->edit($data, $id);
            $res['success'] = 1;
        } else {
            $res['success'] = 0;
            $res['msg'] = 'Id not Defined';
        }
        echo json_encode($res);
    }

    public function deleteData()
    {
        $id = $this->request->getPost('id');
        if ($id != 0) {
            $this->task->hapus($id);
            echo 1;
        } else {
            echo 0;
        }
    }
}
