<?php

namespace App\Controllers\master;

use App\Controllers\BaseController;
use App\Models\Mboard;
use App\Models\Mlist;
use App\Models\MUser;
use DateTime;

class Board extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->model = new MUser();
        $this->board = new Mboard();
        $this->list = new Mlist();
        $this->session = session();
    }

    public function index()
    {
        if ($this->session->get('id_user') == NULL) {
            return redirect()->to('login');
        }
        $data = [
            'title' => 'PM | Task Board',
            'list' => $this->list->getTitle(session()->get('name')),
            'dtlist' => $this->board->getEachList('ha', session()->get('name')),
        ];
        return view('master/board/v_board', $data);
    }

    public function formList($id = '')
    {
        $ftype = 'Add';
        if ($id != '') {
            $ftype = 'Edit';
        }
        $data = [
            'id' => $id,
            'row' => $this->list->getOne($id),
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
        $dtvw['titlerow'] = $title;
        $vw['view'] = view('master/board/v_list_elem', $dtvw);
        echo json_encode($vw);
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
            $this->list->hapus($id);
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
