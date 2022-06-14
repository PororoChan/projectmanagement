<?php

namespace App\Controllers\master;

use App\Controllers\BaseController;
use App\Models\Mslist;
use App\Models\Mstask;
use DateTime;

class Lists extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->task = new Mstask();
        $this->list = new Mslist();
        $this->session = session();
    }

    public function index()
    {
        if ($this->session->get('id_user') == NULL) {
            return redirect()->to('login');
        }
        $data = [
            'title' => 'Lists',
            'list' => $this->task->getAll(),
        ];
        return view('master/task/v_list', $data);
    }

    public function formList($id = '')
    {
        $ftype = 'Add';
        if ($id != '') {
            $ftype = 'Edit';
        }
        $data = [
            'id' => $id,
            'row' => $this->task->getOne($id),
            'form_type' => $ftype,
        ];
        return view('master/board/V_form_list', $data);
    }

    public function addList()
    {
        $title = $this->request->getPost('title');
        $data = [
            'titlename' => $title,
            'createdby' => session()->get('name'),
            'createddate' => date('Y-m-d H:i:s'),
        ];
        if ($title != '') {
            $this->list->tambah($data);
        } else {
            echo 0;
        }
        $dt = [
            'titlerow' => $this->task->getTitle(session()->get('name')),
        ];
        return json_encode($dt);
    }

    public function editList()
    {
        $id = $this->request->getPost('id');

        if ($id != '') {
            $data = [
                'titlename' => $this->request->getPost('title'),
                'updatedby' => session()->get('name'),
                'updateddate' => date('Y-m-d H:i:s'),
            ];

            $this->list->edit($data, $id);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function deleteList()
    {
        $id = $this->request->getPost('id');

        if ($id != '') {
            $this->task->hapus($id);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function form($idt = '')
    {
        $ftype = 'Add';
        if ($idt != '') {
            $ftype = 'Edit';
        }
        $data = [
            'title' => 'PM | Board Form',
            'form_type' => $ftype,
            'id' => $idt
        ];
        return view('master/board/V_form', $data);
    }

    public function switch()
    {
        $code = $this->request->getPost('code');
        $status = $this->request->getPost('status');
        if ($code != '') {
            $q = $this->board->switchSts($status, $code);
            if ($q) {
                $dt['success'] = 1;
            } else {
                $dt['success'] = 0;
            }
        } else {
            $dt['success'] = 0;
        }
        echo json_encode($dt);
    }

    public function addData()
    {
        $date = new DateTime('NOW');
        $tname = $this->request->getPost('taskname');
        $tdesc = $this->request->getPost('taskdesc');
        $tbadge = $this->request->getPost('taskbadge');
        $finish = $this->request->getPost('datefinish');
        $tstatus = $this->request->getPost('taskstatus');
        $data = [
            'taskcode' => substr(md5(time()), 0, 8),
            'taskname' => $tname,
            'taskdesc' => $tdesc,
            'taskbadge' => $tbadge,
            'datefinish' => $finish,
            'taskstatus' => $tstatus,
            'createdby' => $this->session->get('name'),
            'createddate' => $date->format('Y-m-d H:i:s.u'),
        ];
        $q = $this->board->tambah($data);
        if ($q) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
