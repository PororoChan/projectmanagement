<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function __construct()
    {
        // $this->model = new Model();
    }

    public function index()
    {
        echo view('dashboard/v_home');
    }
}
