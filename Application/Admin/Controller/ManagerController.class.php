<?php

namespace Admin\Controller;

class ManagerController extends CommonController
{
    //显示主页
    public function index()
    {
        $data = D('manager')->select();
        $this->assign('data', $data);
        $this->display();
    }

    //编辑管理员
    public function edit()
    {
        if (IS_POST) {


        } else {
            $id = I('get.id');
            //$data = D('Manager')->getId();
            $this->assign('data', $data);
            $this->display();
        }
    }
}

?>