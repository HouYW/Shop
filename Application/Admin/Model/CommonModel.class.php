<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/3
 * Time: 22:14
 */

namespace Admin\Model;

use \Think\Model;

class CommonModel extends Model
{
    /*
     * 功能:获取到get传过来的id值,返回该id所对应的数据
     *参数1:id值,
     *参数2:模型名
    */
    public function getId($m_id)
    {
        $id = I('get.id');
        $data = $this->where(["$m_id" => "$id"])->find();
        return $data;
    }
	//统一调用create方法
	public function callCreate()
	{
		$create = $this->create();
    	if($create === false){
    		$this->error = $this->getError()?:'数据错误';
    		return false;
    	}
    	return true;
	}
    /*
     *更新数据
     */
    public function saveData()
    {
        $create = $this->create();
        //验证create是否有数据
        if($create === false){
    		$this->error = $this->getError()?:'数据错误';
    		return false;
    	}
        //更新数据库
        $result = $this->save();
    	if($result === false){
    		$this->error = $this->getError();
    		return false;
    	}
    	return true;
    }
    //删除数据
    public function delData($m_id)
    {
    	$id = I('get.id');
    	$res = $this->where(["$m_id"=>"$id"])->delete();
    	if($res === false){
    		$this->error = $this->getError();
    		return false;
    	}
    	return true;
    }
    //新增数据
    public function addData()
    {
   		$create = $this->create();
        //验证create是否有数据
        if($create === false){
    		$this->error = $this->getError()?:'数据错误';
    		return false;
    	}
   		//添加数据库
   		$res = $this->add();
    	if(!$res){
    		$this->error = $this->getErrror();
    		return false;
    	}
    	
    	return true;
    }
}