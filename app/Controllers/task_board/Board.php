<?php

namespace App\Controllers\task_board;

use App\Controllers\BaseController;
use App\Models\MUser;

class Board extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->model = new MUser();
    }

    public function index()
    {
        $id = session()->get('id_user');

        if ($id != '') {
            $data['title'] = 'PM | Board';
            $data['row'] = $this->model->getAll();
            return view('dashboard/v_board', $data);
        } else {
            return redirect()->to('login');
        }
    }

    public function addBoard()
    {
    }
}
