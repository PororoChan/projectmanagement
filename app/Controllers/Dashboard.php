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
        $id = session()->get('id_user');
        if ($id != '') {
            $dt['title'] = 'Home';
            return view('dashboard/v_home', $dt);
        } else {
            return redirect()->to('login');
        }
    }
}
