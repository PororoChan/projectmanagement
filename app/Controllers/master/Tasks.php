<?php

namespace App\Controllers\master;

use App\Controllers\BaseController;
use App\Models\Mstask;

class Tasks extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->task = new Mstask();
    }

    public function task()
    {
        if (session()->get('id_user') == NULL) {
            return redirect()->to('login');
        }
        $bid = session()->get('idb');
        $data = [
            'task' => $this->task->getTask($bid),
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
            'row' => $this->task->getOne($id),
        ];
        return view('master/task/V_form_list', $data);
    }

    public function addTask()
    {
        $tasktitle = $this->request->getPost('taskname');
        $boardid = $this->request->getPost('bid');

        $data = [
            'taskid' => random_int(100000, 999999),
            'taskname' => $tasktitle,
            'boardid' => $boardid,
            'seq' => 1,
        ];

        $q = $this->task->addTask($data);
        if ($q) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
