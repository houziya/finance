<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/29
 * Time: 14:58
 */
header("Content-type: text/html; charset=utf-8");
$data = array(
    "identification" => "WD-WX31E851U0SR",//软件标识号
    "mobile" => "18810275298",//手机号
    "typeId" => "16",//验证手机号是否可以注册安装
    "request_time" => time()
);
$key = "a9e925c17555bc3b05866c2d679f89cc";
$sequence = $key . "&" . $data['mobile']. "&" . $data['identification']. "&" . $data['request_time'];
$sign = md5($sequence);
$data['sign'] = $sign;
$datajson = json_encode($data);
//print_r($datajson);
//exit;
$xml = ''.$datajson.'';//要发送的xml
$url = 'http://api.caiwu.renrentou.com/software/VerifyMobile';//接收XML地址
$url = 'http://api.wmm.com/software/VerifyMobile';//接收XML地址

$header[] = 'Content-type: text/xml';//定义content-type为xml
$ch = curl_init(); //初始化curl
curl_setopt($ch, CURLOPT_URL, $url);//设置链接

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//设置是否返回信息

curl_setopt($ch, CURLOPT_HTTPHEADER, $header);//设置HTTP头

curl_setopt($ch, CURLOPT_POST, 1);//设置为POST方式

curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);//POST数据

$response = curl_exec($ch);//接收返回信息
if(curl_errno($ch)){//出错则显示错误信息
    print curl_error($ch);
}
curl_close($ch); //关闭curl链接
echo $response;//显示返回信息
?>