<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/4
 * Time: 10:29
 */
//密码加密函数
function encrypt_password($password){
	//加盐（值）
	$salt = 'fdsadsahgdsa34354';
	//加密
	return md5( md5( $password ) . $salt );
}

function remove_xss($string){
	//相对index.php入口文件，引入HTMLPurifier.auto.php核心文件
    require_once './Public/Admin/htmlpurifier/HTMLPurifier.auto.php';
    // 生成配置对象
    $cfg = HTMLPurifier_Config::createDefault();
    // 以下就是配置：
    $cfg -> set('Core.Encoding', 'UTF-8');
    // 设置允许使用的HTML标签
    $cfg -> set('HTML.Allowed','div,b,strong,i,em,a[href|title],ul,ol,li,br,p[style],span[style],img[width|height|alt|src]');
    // 设置允许出现的CSS样式属性
    $cfg -> set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
    // 设置a标签上是否允许使用target="_blank"
    $cfg -> set('HTML.TargetBlank', TRUE);
    // 使用配置生成过滤用的对象
    $obj = new HTMLPurifier($cfg);
    // 过滤字符串
    return $obj -> purify($string);
}

#递归方法实现无限极分类
function getTree($list,$pid=0,$level=0) {
    static $tree = array();
    foreach($list as $row) {
        if($row['pid']==$pid) {
            $row['level'] = $level;
            $tree[] = $row;
            getTree($list, $row['id'], $level + 1);
        }
    }
    return $tree;
}

//手机号加密函数
// 15313131313   153****1313
function encrypt_phone($phone){
    return substr($phone, 0, 3) . '****' . substr($phone, 7, 4);
}

function curl_request($url, $post = false, $params = array(),$https = false)
{
    //1.初始化init,可以传递一个请求地址参数
    $ch = curl_init($url);
    // 2curl_setopt()函数设置请求参数(选项)
    //如果是post请求,设置请求方式
    if ($post) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    }
    if ($https) {
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false); //禁止从服务端验证https证书
    }
    //返回具体的数据
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    //curl_exec 函数发送请求,有返回值
    $res = curl_exec($ch);
    //curl_close 关闭请求会话
    curl_close($ch);
    return $res;
}