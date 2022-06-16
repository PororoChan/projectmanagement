<?php

namespace App\Controllers\master;

use App\Controllers\BaseController;
use App\Models\Mstask;
use App\Models\Mstasklist;

class Tasklist extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->task = new Mstask();
        $this->tasklist = new Mstasklist();
    }

    public function FormViews($id = 0)
    {
        $ftype = 'Add';
        if ($id != 0) {
            $ftype = 'Edit';
        }
        $data = [
            'row' => $this->tasklist->getOne($id),
            'form_type' => $ftype,
            'id' => $id,
        ];
        $vw['view'] = view('master/tasklist/v_form', $data);
        echo json_encode($vw);
    }

    public function addData()
    {
        $tname = $this->request->getPost('taskname');
        $taskid = $this->request->getPost('tid');

        if ($tname != '') {
            $data = [
                'taskid' => $taskid,
                'tasklistname' => $tname,
                'createddate' => date('Y-m-d H:i:s'),
                'createdby' => session()->get('name')
            ];

            $this->tasklist->tambah($data);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function item()
    {
        $taskid = $this->request->getPost('tid');

        $data = [
            'task' => $this->task->getAll(),
            'list' => $this->tasklist->getAll($taskid),
        ];

        $vw['view'] = view('master/tasklist/v_taskitem', $data);
        echo json_encode($vw);
    }

    public function deleteData()
    {
        $id = $this->request->getPost('id');

        if ($id != 0) {
            $this->tasklist->hapus($id);
            echo 1;
        } else {
            echo 0;
        }
    }
}
