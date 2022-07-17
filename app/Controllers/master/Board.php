<?php

namespace App\Controllers\master;

use App\Controllers\BaseController;
use App\Models\Mboard;
use App\Models\Msboardshare;
use App\Models\Mscomment;
use App\Models\Mstask;
use App\Models\Mstasklist;
use App\Models\MUser;
use DateTime;

class Board extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->date = new DateTime('now');
        $this->user = new MUser();
        $this->board = new Mboard();
        $this->share = new Msboardshare();
        $this->task = new Mstask();
        $this->comment = new Mscomment();
        $this->tasklist = new Mstasklist();
    }

    public function index()
    {
        $id = session()->get('id_user');
        if ($id == null) {
            return redirect()->to('login');
        } else {
            $user = session()->get('name');
            $data = [
                'title' => 'PM | Boards',
                'board' => $this->board->getBoard($user),
            ];
            return view('master/board/v_board', $data);
        }
    }

    public function countBoard()
    {
        if (session()->get('id_user') == NULL) {
            return redirect()->to('login');
        } else {
            $name = session()->get('name');
            $q = $this->board->count($name);
        }
        echo json_encode($q);
    }

    public function board()
    {
        if (session()->get('id_user') == NULL) {
            return redirect()->to('login');
        }
        $user = session()->get('name');
        $data = [
            'board' => $this->board->getBoard($user),
        ];
        return view('master/board/v_card', $data);
    }

    public function goList($bid)
    {
        if (session()->get('id_user') == NULL) {
            return redirect()->to('login');
        } else {
            $board = $this->board->getOne($bid);
            session()->set('idb', $board['boardid']);
            session()->set('bname', $board['boardname']);
            $y = $this->share->getRoles(session()->get('id_user'), session()->get('idb'));
            if ($board != '') {
                $q = [
                    'title' => 'PM | ' . $board['boardname'],
                    'task' => $this->task->getTask($bid),
                    'comment' => $this->comment,
                    'tasklist' => $this->tasklist,
                    'roles' => (($y != '' ? $y['roles'] : '0')),
                ];
            } else {
                return redirect()->to('board');
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

    public function getUser()
    {
        $search = $this->request->getPost('searchTerm');
        $data = $this->user->getUsers($search);
        $res = array();
        foreach ($data as $dt) {
            $res[] = array("id" => $dt['userid'], "text" => $dt['name']);
        }
        echo json_encode($res);
    }

    public function shareBoard()
    {
        $bid = $this->request->getPost('bid');
        if ($bid != '') {
            $data = [
                'id' => $bid,
                'user' => session()->get('id_user'),
                'board' => session()->get('bname'),
            ];
            $res['view'] = view('master/board/share/v_share_form', $data);
            $res['success'] = 1;
        } else {
            $res['success'] = 0;
        }
        echo json_encode($res);
    }

    public function addBoard()
    {
        $btitle = $this->request->getPost('boardtitle');
        if ($btitle != '') {
            $data = [
                'boardid' => random_int(1000000, 9999999),
                'boardname' => $btitle,
                'createddate' => $this->date->format('Y-m-d H:i:s'),
                'createdby' => session()->get('name'),
            ];
            $this->board->tambah($data);
            $dt['success'] = 1;
        } else {
            $dt['success'] = 0;
            $dt['msg'] = 'Board Title cannot be empty';
        }
        echo json_encode($dt);
    }

    public function editBoard()
    {
        $title = $this->request->getPost('boardtitle');
        $id = $this->request->getPost('idboard');
        $dt = [
            'boardname' => $title,
            'updateddate' => $this->date->format('Y-m-d H:i:s'),
            'updatedby' => session()->get('name'),
        ];
        if ($title != '') {
            $this->board->edit($dt, $id);
            $res['success'] = 1;
        } else {
            $res['success'] = 0;
            $res['msg'] = 'Boardname cannot empty';
        }
        echo json_encode($res);
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
        session()->set('idb', null);
        session()->set('bname', null);
        return redirect()->to('boards');
    }
}
