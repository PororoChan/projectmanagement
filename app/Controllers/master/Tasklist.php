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

    public function switch()
    {
        $listid = $this->request->getPost('listid');
        $taskid = $this->request->getPost('taskid');
        if ($taskid != '' && $listid != '') {
            $data = [
                'taskid' => $taskid,
            ];
            $this->tasklist->updateList($data, $listid);
            $b['success'] = 1;
        } else {
            $b['success'] = 0;
            $b['msg'] = 'Null Data!';
        }

        echo json_encode($b);
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
