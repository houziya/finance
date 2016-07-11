<?php
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: likun
 * Date: 15-4-13
 * Time: 下午2:01
 */
$id = 31;
$qid = 3;
$typeId = 11;
$token = "ftoken3";
$sort_ver_id = 1;
$uid = 775;
$subbranch = 203;
$company = "北京田老师餐饮管理有限公司6";
$subbranch = 203;
$identification = "4356";
$dbtype = "1";
$dbname = "bw9kbzpro_01";
$dbusername = "sa";
$dbpwd = "123456";
$dbaddress = "192.168.1.254";
$code = "4467";
$qu_type = "1";
$qu_frequency = "10";
$dbsql = 'select * from aa where begin_time>{#begin_time} and end_time<{#end_time}';
$request_time = time();
$data = array(
   "id" => $id,//软件标识号
   "qid" => $qid,//软件标识号
   "typeId" => $typeId,//软件标识号
   "uid" => $uid,//软件标识号
   "sort_ver_id" => $sort_ver_id,//软件标识号
   "company" => $company,//软件标识号
   "subbranch" => $subbranch,//软件标识号
   "token" => $token,//软件标识号
   "identification" => $identification,//识别码
   "dbtype" => $dbtype,//识别码
   "dbname" => $dbname,//识别码
   "dbusername" => $dbusername,//分店号
   "dbpwd" => $dbpwd,//分店号
   "dbaddress" => $dbaddress,//分店号
   "dbsql" => $dbsql,//分店号
   "code" => $code,//分店号
   "qu_type" => $qu_type,//分店号
   "qu_frequency" => $qu_frequency,//分店号
   "request_time" => $request_time,//分店号
 );
 //print_r($data);
 //exit;
 
$key = "a9e925c17555bc3b05866c2d679f89cc";         
$sequence = $key."&".$token."&".$code."&".$subbranch."&".$identification."&".$request_time;//待签名字符串
$sign = md5($sequence);
//print_r($sequence); echo "\n\r";


$data['sign'] = $sign;

$datajson = json_encode($data);
print_r($datajson);
//exit;
$xml = ''.$datajson.'';//要发送的xml 
$url = 'http://api.caiwu1.renrentou.com/software/ClientUpdate';//接收XML地址
$url = 'http://api.wmm.com/software/ClientUpdate';//接收XML地址

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