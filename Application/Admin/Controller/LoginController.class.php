<?php 
	namespace Admin\Controller;
	
	use \Think\Controller;

	class LoginController extends Controller
	{
		//加载主页
		public function login(){

			$this->display();
		
		}
		//验证用户信息
		
		public function addLogin(){
			//如果不是post请求	
			if(!IS_POST){
				
				return;
			
			}
			//接下来处理post请求
			$res = D('login')->create();

		}

		//退出
		public function quit()
		{

		
		}

		//验证码
		public function code(){
			//配置验证码
			$config = array(
		        'seKey'     =>  'ThinkPHP.CN',   // 验证码加密密钥
		        'codeSet'   =>  '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',//验证码字符集合
		        'expire'    =>  1800,            // 验证码过期时间（s）
		        'useZh'     =>  false,           // 使用中文验证码 
		        'useImgBg'  =>  false,           // 使用背景图片 
		        'fontSize'  =>  30,              // 验证码字体大小(px)
		        'useCurve'  =>  true,            // 是否画混淆曲线
		        'useNoise'  =>  true,            // 是否添加杂点	
		        'imageH'    =>  0,               // 验证码图片高度
		        'imageW'    =>  0,               // 验证码图片宽度
		        'length'    =>  4,               // 验证码位数
		        'fontttf'   =>  '',              // 验证码字体，不设置随机获取
		        'bg'        =>  array(243, 251, 254),  // 背景颜色
		        'reset'     =>  true,           // 验证成功后是否重置
	        );
			//实例化验证码类
			$verify = new \Think\Verify($config);
			//生成验证码
			$verify->entry();

		}
	}
?>