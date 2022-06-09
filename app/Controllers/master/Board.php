<?php

namespace App\Controllers\master;

use App\Controllers\BaseController;
use App\Models\Mboard;
use App\Models\MUser;
use DateTime;

class Board extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->model = new MUser();
        $this->board = new Mboard();
        $this->session = session();
    }

    public function index()
    {
        if ($this->session->get('id_user') == NULL) {
            return redirect()->to('login');
        }

        $data = [
            'title' => 'PM | Task Board',
            'todo' => $this->board->getEachList('TODO', session()->get('name')),
            'active' => $this->board->getEachList('Active', session()->get('name')),
            'progress' => $this->board->getEachList('In Progress', session()->get('name')),
            'complete' => $this->board->getEachList('Completed', session()->get('name')),
        ];

        return view('dashboard/v_board', $data);
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
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('sts');

        if ($id != '') {
            $this->board->switchSts($status, $id);
            $dt['success'] = 1;
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
