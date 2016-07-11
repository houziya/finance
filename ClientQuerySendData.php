<?php
/**
 * Created by PhpStorm.
 * User: likun
 * Date: 15-4-13
 * Time: 下午2:01
 */
header("Content-type: text/html; charset=utf-8");
$typeId = 15;
$sort_client_id = 1;
$code = "b7b7-ee17-6566-0103";
$source = 1;
$amount = '23';
$dataA="23";
$topdate = "1468611200";
$add_time = "1466611201";
$db_sql = "select * from aa where begin_time>'2016-06-24 06:50:00' and end_time<'2016-06-24 07:00:00'";
$end_time = "1466611200";

$request_time = time();

$data = array(
   "amount" => $amount,//软件标识号
   "data" => $dataA,//软件标识号
   "source" =>  1,//软件标识号
   "sort_client_id" =>  $sort_client_id,//软件标识号
   "topdate" =>  $topdate,//软件标识号
   "end_time" =>  $end_time,//软件标识号
   "db_sql" =>  $db_sql,//软件标识号
   "code" =>  $code,//软件标识号
   "typeId" =>  $typeId,//软件标识号
   "request_time"=>$request_time,
 );

$key = "a9e925c17555bc3b05866c2d679f89cc";         
$sequence = $key."&".$amount."&".$dataA."&".$request_time;
$sign = md5($sequence);
//print_r($sequence); echo "\n\r";


$data['sign'] = $sign;

$datajson = json_encode($data);
print_r($datajson);
$xml = ''.$datajson.'';//要发送的xml 
$url = 'http://api.caiwu1.renrentou.com/software/ClientQuerySendData';//接收XML地址
$url = 'http://api.wmm.com/software/ClientQuerySendData';//接收XML地址

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