<?php

namespace App\Controllers\master;

use App\Controllers\BaseController;
use App\Models\Msboardshare;
use App\Models\MUser;
use DateTime;

class SBoard extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->date = new DateTime('now');
        $this->share = new Msboardshare();
        $this->user = new MUser();
    }

    public function getBoard()
    {
        $user = session()->get('id_user');
        $data = [
            'title' => 'PM | Shared Board',
            'board' => $this->share->getBoard($user),
        ];
        return view('master/board/share/v_share', $data);
    }

    public function count()
    {
        $userid = session()->get('id_user');
        if ($userid == null) {
            return redirect()->to('login');
        } else {
            $query = $this->share->getCount($userid);
        }
        echo json_encode($query);
    }

    public function addShared()
    {
        $roles = '';
        $userid = $this->request->getPost('uid');
        $bid = $this->request->getPost('bidd');
        $board = $this->request->getPost('bname');
        $uname = $this->request->getPost('username');
        $role = $this->request->getPost('roles');
        if ($userid != '' && $uname != '') {
            if ($role == 1) {
                $roles = 'Admin';
            } else if ($role == 2) {
                $roles = 'Member';
            }
            $cek = $this->user->cekUser($uname);
            if ($cek) {
                if ($cek['userid'] == session()->get('id_user')) {
                    $res = [
                        'success' => 0,
                        'msg' => "You can't share to yourself",
                    ];
                } else {
                    $data = [
                        'userid' => session()->get('id_user'),
                        'boardid' => $bid,
                        'boardname' => $board,
                        'roles' => $roles,
                        'shareddate' => $this->date->format('Y-m-d H:i:s'),
                        'sharedby' => session()->get('name'),
                        'sharedto' => $cek['userid'],
                    ];
                    $q = $this->share->addBoard($data);
                    if ($q) {
                        $res = [
                            'success' => 1,
                            'msg' => 'Board ' . $board . ' success shared to ' . $uname,
                        ];
                    } else {
                        $res = [
                            'success' => 0,
                            'msg' => 'Database Error',
                        ];
                    }
                }
            } else {
                $res = [
                    'success' => 0,
                    'msg' => "User " . $uname . " doesn't exist",
                ];
            }
        } else {
            $res = [
                'success' => 0,
                'msg' => "User's name required",
            ];
        }
        echo json_encode($res);
    }
}
