<?php 
	namespace Admin\Controller;

	use \Think\Controller;

	class CommonController extends Controller
	{
		public function __construct(){
			
			parent::__construct();
		
		}
		//封装调用create返回的结果
		/*public function callCreate($model){
			$res = D($model)->callCreate();
			if(!$res){
				$error = D($model)->getError();
				$this->error($error);
			}
		}*/
        //封装列表跳转详情页的方法
        public function showDetail($model,$id){
            $data = D($model)->getId($id);
            $this->assign('data',$data);
            $this->display();
        }
        //修改数据后,储存到数据库
	    public function saveData($model){    
	        $res = D($model)->saveData();
	       	if(!$res){
	       		$error = D($model)->getError();
	        	$this->error($error);
	        }    
	    }
        //把数据从数据库里删除
        public function delData($model,$id)
        {
        	$res = D('Manager')->delData($id);
        	if(!$res){
        		$error = D('Manager')->getError();
        		$this->error($error);
        	}
        }
        //新增数据到数据库
        public function addData($model)
        {
        	$res = D($model)->addData();  	
        	if(!$res){
        		$error = D($model)->getError();
        		$this->error($error);
        	}
        }
	}
?>