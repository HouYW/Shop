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
	//新增管理员
    public function add()
    {
    	if(IS_POST){
    		//添加数据到数据库
    		$this->addData('Manager');
    		$this->success('添加成功',U('Admin/Manager/index'));
    	
    	}else{
    		
    		$this->display();
    	}
    }
    //删除管理员
    public function del()
    {
    	//删除数据
    	$this->deldata('Manager',"id");
    	$this->success('删除成功',U('Admin/Manager/index'));
    
    }
    //编辑管理员
    public function edit()
    {
        if (IS_POST) {
            //更新数据到数据表
            $this->saveData('Manager');
            $this->success('修改成功',U('Admin/Manager/index'));
        } else {
            //调用方法,列表跳转到详情页
            $this->showDetail('Manager',"id");
        }
    }
    //重置密码
    public function resetPwd()
    {
    	if(IS_POST){
    		$res = D('Manager')->callCreate();
			if(!$res){
				$error = D($model)->getError();
				$this->error($error);
			}
			
			$result = D('Manager')->save();
			if($result === false){
				$error = D($model)->getError();
				$this->error($error);
			}
    		
    		$this->success('修改成功',U('Admin/Manager/index'));
    	
    	}else{
    		
    		//调用方法,列表跳转到详情页
            $this->showDetail('Manager',"id");
    	}
    }
}

?>