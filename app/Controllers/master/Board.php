<?php

namespace App\Controllers\master;

use App\Controllers\BaseController;
use App\Models\Mboard;
use App\Models\Mlist;
use App\Models\Mslist;
use App\Models\Mstask;
use App\Models\MUser;
use DateTime;

class Board extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->board = new Mboard();
        $this->task = new Mstask();
        $this->list = new Mslist();
    }

    public function index()
    {
        $id = session()->get('id_user');
        if ($id == null) {
            return redirect()->to('login');
        }
        $data = [
            'title' => 'Board',
            'board' => $this->board->getAll(),
        ];
        return view('master/board/v_board', $data);
    }

    public function countBoard()
    {
        if (session()->get('id_user') == NULL) {
            return redirect()->to('login');
        }
        $q = $this->board->count();

        echo json_encode($q);
    }

    public function board()
    {
        if (session()->get('id_user') == NULL) {
            return redirect()->to('login');
        }
        $data = [
            'board' => $this->board->getAll(),
        ];
        return view('master/board/v_card', $data);
    }

    public function goList($boardid)
    {
        if (session()->get('id_user') == NULL) {
            return redirect()->to('login');
        } else {
            if ($boardid == '') {
                return redirect()->to('board');
            } else {
                $board = $this->board->getOne($boardid);
                if ($board != '') {
                    $q = [
                        'title' => 'Task List',
                        'task' => $this->task->getTask($boardid),
                        session()->set('idb', $board['boardid']),
                        session()->set('bname', $board['boardname']),
                    ];
                } else {
                    return redirect()->to('board');
                }
            }
        }
        return view('master/task/v_list', $q);
    }

    public function FormViews($id = 0)
    {
        $ftype = 'Add';
        if ($id != 0) {
            $ftype = 'Edit';
        }
        $data = [
            'row' => $this->board->getOne($id),
            'form_type' => $ftype,
            'id' => $id,
        ];
        $vw['view'] = view('master/board/v_form', $data);
        echo json_encode($vw);
    }

    public function addBoard()
    {
        $btitle = $this->request->getPost('boardtitle');
        $data = [
            'boardid' => random_int(1000000, 9999999),
            'boardname' => $btitle
        ];
        $this->board->tambah($data);
        echo 1;
    }

    public function editBoard()
    {
        $title = $this->request->getPost('boardtitle');
        $id = $this->request->getPost('idboard');
        $dt = [
            'boardname' => $title,
        ];
        $this->board->edit($dt, $id);
        echo 1;
    }

    public function deleteBoard()
    {
        $id = $this->request->getPost('id');
        if ($id != 0) {
            $this->board->hapus($id);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function clean()
    {
        return redirect()->to('board');
    }
}
