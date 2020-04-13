<?php
date_default_timezone_set('PRC'); 
$date = date("Y-m-d",strtotime("-1 day"));
//如果没有get到参数就跳转
 $ip=$_GET["ip"];
if(strlen($ip)==0){
   header("Location: about:blank");
   die();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html">
  
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no, address=no, email=no">
  <meta name="x5-orientation" content="portrait">
  <meta name="x5-fullscreen" content="true">
  <meta name="screen-orientation" content="portrait">
  <meta name="full-screen" content="yes">
  <link rel="stylesheet" href="fenfa/static/css/wd.css">
  <title><?php echo $_GET["ip"];?></title>
  <script src="https://lib.baomitu.com/clipboard.js/1.7.1/clipboard.min.js"></script>
</head>
<body>
<script type="text/javascript">
  function kefuFesult(url) {
    document.querySelector(".kefuBtn").href = url;
  }
</script>

  <section id="tips" class="height-100">
    <img class="bg-img" src="fenfa/static/picture/ydaz.png">
    <article class="content-box">
      <img class="bg-img ios-img" src="fenfa/static/picture/ydpg.jpg">
    </article>
  </section>

  <div class="wp">
    <div class="main">
      <div class="top">
        <div class="logobox">
          <img src="app/img/<?php echo $_GET["ip"];?>.png">
        </div>
        <h1><?php echo $_GET["ip"];?> v1.0.0</h1>
      </div>
      <div class="btnbox">
        <p id="filesize" style="display:none;">大小：</p>
        <button class="btn" id="install">下载安装</button>
         <!--<a class="btn kefuBtn" href="javascript:void(0)" target="_blank" style="">在线客服</a>-->

        <!-- 提示文案 -->
        <div id="ios-tip" style="display:none;">
          <em>长按框内 &gt; 全选 &gt; <span id="tip">拷贝链接</span> &gt; 打开Safar苹果浏览器</em>
          <div class="copy-box"></div>
          <input type="button" class="copy" value="一键复制" data-clipboard-target=".copy-box">
        </div>

        <div id="ios-help" style="display:none;">
          <div class="msgbox">
            <p id="txtinfo">苹果手机如何安装?</p>
          </div>

          <p class="homebox">第一步：弹出配置下载文件时，点击"允许"</p>
          <p>
            <img src="fenfa/static/picture/yindao1.png">
            <br>
          </p>

          <p class="homebox">第二步：打开设置→通用→描述文件</p>
          <p>
            <img src="fenfa/static/picture/yindao2.png">
            <br>
          </p>

          <p class="homebox">第三步：找到右上角的"安装"</p>
          <p>
            <img src="fenfa/static/picture/yindao3.png">
          </p>
        </div>
      </div>
      <img id="qrcode" src="">
      <p style="font-size:18px">手机扫描二维码安装</p>
    </div>
  </div>

  <script>
    var isAndroid, isiOS, isSafar;
    window.onload = function () {
      var u = navigator.userAgent;
      isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1;
      isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
      isSafar = u.toLowerCase().indexOf('safari') > -1;

      if (isWeiXin() || isQQ()) {
        document.getElementById("tips").style.display = 'block';
        document.querySelector('.wp').style.display = 'none';
       
       
       
       
       
        if (isiOS) {
          document.querySelector('.ios-img').style.display = 'block';
          document.querySelector('.and-img').style.display = 'none';
        } else if (isAndroid) {
          document.querySelector('.ios-img').style.display = 'none';
          document.querySelector('.and-img').style.display = 'block';
        }
        
        
      }


      function isWeiXin() {
        var ua = window.navigator.userAgent.toLowerCase();
        if (ua.match(/MicroMessenger/i) == 'micromessenger') {
          return true;
        }

        return false;
      }



      function isQQ() {
        var ua = window.navigator.userAgent.toLowerCase();
        if (ua.match(/QQ\//i) == "qq/") {
          return true;
        }

        return false;
       
      }

      document.querySelector(".copy-box").innerHTML = location.href;

      if (isiOS) {
        if (isSafar) {
          document.getElementById("ios-tip").style.display = "none";
          document.getElementById("ios-help").style.display = "block";
        }
        
        else {
          document.getElementById("install").style.display = "none";
          document.getElementById("ios-tip").style.display = "block";
          document.getElementById("ios-help").style.display = "none";
        }
      }
                                                                                  //下载地址
      document.getElementById("qrcode").src = "http://qr.topscan.com/api.php?text=https://hrbf.com.cn/showapp.php?ip=<?php echo $_GET["ip"];?>";
    };

    //自动选中
    var key = document.querySelector('.copy-box');
    document.addEventListener("selectionchange",
      function (e) {
        window.getSelection().selectAllChildren(key);
      },
      false);

    var clipboard = new Clipboard(".copy");
    clipboard.on('success', function (e) { if (!e.trigger.className.match(/success/)) { e.trigger.className += " success"; } e.trigger.value = "复制成功，打开Safar苹果浏览器"; });
    clipboard.on('error', function (e) { if (!e.trigger.className.match(/fail/)) { e.trigger.className += " fail"; } e.trigger.value = "复制失败，请长按框内手工复制"; });

    document.getElementById("install").onclick = function () {
      if (isAndroid) {
        location.href = "app/apk/<?php echo $_GET["ip"];?>.apk";
        return;
      }

      if (isiOS) {
		var str=navigator.userAgent.toLowerCase(); 
    	var ver=str.match(/cpu iphone os (.*?) like mac os/);
		v=ver[1].replace(/_/g,'.');
		var e = '13';
	 	if(v>=e){
     	location.href='app/ios/ios13/<?php echo $_GET["ip"];?>.mobileconfig';
    	}
    	else{
    	location.href='app/ios/<?php echo $_GET["ip"];?>.mobileconfig';
   		}
        setTimeout(function(){
          location.href = "fenfa/static/js/app.mobileprovision";
        }, 2000 );
        return;
        
      }

      alert("安装失败，请用手机浏览器扫描二维码安装！");
    };
  </script>



</body>
</html>