<?php

namespace App\Controllers\user_auth;

use App\Controllers\BaseController;
use App\Models\MUser;

class Login extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->model = new MUser();
    }

    public function index()
    {
        return view('v_login');
    }

    public function auth()
    {
        $session = session();
        $uname = $this->request->getPost('uname');
        $pass = $this->request->getPost('passw');

        $data = $this->model->cek($uname);

        if ($data) {
            if (password_verify($pass, rtrim($data['password']))) {
                $session->set('name', $data['name']);
                $session->set('id_user', $data['userid']);
                $res['success'] = 1;
            } else {
                $res['success'] = 0;
            }
        } else {
            $res['success'] = 0;
        }

        echo json_encode($res);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('login');
    }
}
