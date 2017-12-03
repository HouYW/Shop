<?php 
	namespace Admin\Model;
	
	use \Think\Model;

	class LoginModel extends CommonModel()
	{
		//
		protected $truetablename = 'tpshop_manager';

		//字段映射
		protected function $_map = array(
		
		);
		//自动验证
		protected fucntion $_validate = array(
			array('username','require','帐号不能为空');
			array('password','require','密码不能为空');
		);
		//自动完成
		protected function $_auto = array(

			array('last_login_time','lastLoginTime','function');

		)
	} 
?>