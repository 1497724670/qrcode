<?php

if ($_GET['url_long']) {
    $url_long = $_GET['url_long'];
} else {
    echo "Longurl can not be empty.";
    return;
}

// 短网址api接口
// 腾讯 http://shorturl.8446666.sojson.com/qq/shorturl?url= （失效）
// 新浪 http://shorturl.8446666.sojson.com/sina/shorturl?url= 

$api = "http://shorturl.8446666.sojson.com/sina/shorturl?url=";

// 请求地址
$url = $api . $url_long;

// 新浪
if($api == "http://shorturl.8446666.sojson.com/sina/shorturl?url=") {
    $res = json_decode(file_get_contents($url), true);
    if($res["status"] == 200) {
        $tinyurl = str_replace("http", "https", $res["shorturl"]);
    } else {
        $tinyurl = 'Short URL generation failed, the reason may be that the request frequency exceeds 300 times / h, and the IP is blocked for one day.';    
    }

}

echo $tinyurl;
