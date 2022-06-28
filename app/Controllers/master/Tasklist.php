<?php

namespace App\Controllers\master;

use App\Controllers\BaseController;
use App\Models\Mscomment;
use App\Models\Mstask;
use App\Models\Mstasklist;
use DateTime;

class Tasklist extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->task = new Mstask();
        $this->comment = new Mscomment();
        $this->tasklist = new Mstasklist();
    }

    public function FormViews($id = 0)
    {
        $ftype = 'Add';
        if ($id != 0) {
            $ftype = 'Edit';
        }
        $data = [
            'id' => $id,
            'form_type' => $ftype,
            'count' => $this->comment->comCount($id),
            'comment' => $this->comment->getComment($id),
            'row' => $this->tasklist->getOne($id),
        ];
        $vw['view'] = view('master/tasklist/v_form', $data);
        echo json_encode($vw);
    }

    public function switch()
    {
        $listid = $this->request->getPost('listid');
        $taskid = $this->request->getPost('taskid');
        if ($taskid != '' && $listid != '') {
            $data = [
                'taskid' => $taskid,
            ];
            $this->tasklist->updateList($data, $listid);
            $b['success'] = 1;
        } else {
            $b['success'] = 0;
            $b['msg'] = 'Null Data!';
        }

        echo json_encode($b);
    }

    public function addData()
    {
        $tname = $this->request->getPost('taskname');
        $taskid = $this->request->getPost('tid');
        if ($tname != '') {
            $data = [
                'taskid' => $taskid,
                'tasklistname' => $tname,
                'createddate' => date('Y-m-d H:i:s'),
                'createdby' => session()->get('name')
            ];

            $this->tasklist->tambah($data);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function editData()
    {
        $tname = $this->request->getPost('taskname');
        $tdesc = $this->request->getPost('desc');
        $taskid = $this->request->getPost('id');

        if ($tname != '') {
            $data = [
                'tasklistname' => $tname,
                'description' => $tdesc,
                'updateddate' => date('Y-m-d H:i:s'),
                'updatedby' => session()->get('name'),
            ];

            $this->tasklist->edit($data, $taskid);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function deleteData()
    {
        $id = $this->request->getPost('id');
        if ($id != 0) {
            $this->tasklist->hapus($id);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function addComment()
    {
        $date = new DateTime('now');
        $taskid = $this->request->getPost('task');
        $comment = $this->request->getPost('comment');

        if ($comment != '') {
            $data = [
                'taskid' => $taskid,
                'userid' => session()->get('id_user'),
                'message' => $comment,
                'createddate' => $date->format('Y-m-d H:i:s.u'),
                'createdby' => session()->get('name'),
            ];

            $this->comment->tambah($data);
            $dt['success'] = 1;
            $vd = [
                'count' => $this->comment->comCount($taskid),
                'comment' => $this->comment->getComment($taskid),
            ];
            $dt['view'] = view('master/comment/v_comment', $vd);
        } else {
            $dt['msg'] = 'Comment cannot be empty';
            $dt['success'] = 0;
        }

        echo json_encode($dt);
    }

    public function editComment()
    {
        $id = $this->request->getPost('id');
        $task = $this->request->getPost('task');
        $newcom = $this->request->getPost('com');

        if ($id != '') {
            $data = [
                'message' => $newcom,
            ];

            $this->comment->edit($data, $id);
            $res['success'] = 1;
            $vw = [
                'count' => $this->comment->comCount($task),
                'comment' => $this->comment->getComment($task),
            ];
            $res['view'] = view('master/comment/v_comment', $vw);
        } else {
            $res['success'] = 0;
        }

        echo json_encode($res);
    }

    public function deleteComment()
    {
        $id = $this->request->getPost('id');
        $taskid = $this->request->getPost('taskid');

        if ($id != '') {
            $this->comment->hapus($id);

            $data = [
                'count' => $this->comment->comCount($taskid),
                'comment' => $this->comment->getComment($taskid),
            ];

            $vw['view'] = view('master/comment/v_comment', $data);
            $vw['success'] = 1;
        } else {
            $vw['success'] = 0;
        }

        echo json_encode($vw);
    }
}
