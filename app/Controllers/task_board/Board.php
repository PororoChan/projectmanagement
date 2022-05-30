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
        echo view('dashboard/v_board');
    }

    public function addBoard()
    {
    }
}
