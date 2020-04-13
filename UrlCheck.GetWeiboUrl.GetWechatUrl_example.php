<?php
include_once 'src/businiao.lib/businiao.lib.php';
//require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
$appid='284146222';
$appkey='518be1e3604c13672911de559230f1a1';

/**
 * 返回code代码汇总：https://wechaturl.gitbook.io/
 * 本案例做了3个功能
 * 1.微信url检测状态
 * 2.获取微信短网址
 * 3.获取微博短网址
 * */
$url='https://www.baidu.com';
/**微信url检测状态
 * api详细帮助：https://wechaturl.gitbook.io/
 * 
 * */
$UrlCheck_result=(new UrlCheck($appid,$appkey))->get($url);
print_r(json_decode($UrlCheck_result,true));

/**获取微信短网址
 * https://wechaturl.gitbook.io/
 * */
$GetWechatShortUrl_result=(new GetWechatShortUrl($appid,$appkey))->get($url);
print_r(json_decode($GetWechatShortUrl_result,true));

/**获取微博短网址
 * 
 * https://wechaturl.gitbook.io/
 * **/
$GetWeiboShortUrl_result=(new GetWeiboShortUrl($appid,$appkey))->get($url);
print_r(json_decode($GetWeiboShortUrl_result,true));