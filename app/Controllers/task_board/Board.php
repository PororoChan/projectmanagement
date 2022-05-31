<?php

namespace App\Controllers\task_board;

use App\Controllers\BaseController;

class Board extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function index()
    {
        $id = session()->get('id_user');

        if ($id != '') {
            $data['title'] = 'PM | Board';
            return view('dashboard/v_board', $data);
        } else {
            return redirect()->to('login');
        }
    }

    public function addBoard()
    {
    }
}
