<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $url = "www.shop.com/Home/Index/test_api";
        $params = array();
        $data = curl_request($url,true);
        dump($data);die;
        //$this->show('home');
    }
    public function test_api(){

        $arr = array(
            'code'=>10001,
            'msg'=>'ok'
        );
            $this->ajaxReturn($arr);
    }
}