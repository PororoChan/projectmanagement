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
        helper('string');
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
