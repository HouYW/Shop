<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/3
 * Time: 22:16
 */

namespace Admin\Model;

class  ManagerModel extends CommonModel
{
   //字段映射
	protected $_map = array(
		'name'=>'username',
		'nick'=>'nickname',
	);
	//自动验证
	protected $_validate = array(
		
		array('username', 'require', '用户名不能为空'),
		array('nickname', 'require', '昵称不能为空'),
		array('email', 'require', '邮箱不能为空'),
		array('password', 'require', '密码不能为空'),
		array('email', '', '邮箱已被注册', 0, 'unique')
	);
	//自动完成
	protected $_auto = array(
		array('create_time', 'time', 1, 'function'),
		array('password','encrypt_password',2,'function')
	);
}