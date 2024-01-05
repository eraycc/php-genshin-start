<?php
function encodeURLToBase64($url) {
    // 使用base64_encode()函数对URL进行编码
    $encodedURL = base64_encode($url);
    return $encodedURL;
}

$userAgent = $_SERVER['HTTP_USER_AGENT'];
// 定义搜索引擎的正则表达式模式
$searchEnginePatterns = ['/Googlebot/i', '/Bingbot/i', '/Yahoo/i', '/Baidu/i', '/360Spider/i', '/YisouSpider/i', '/Bytespider/i', '/YandexBot/i', '/DuckDuckGo/i', '/Sogou/i', '/Exabot/i', '/BingPreview/i', '/Baiduspider/i', '/Yandex/i', '/msnbot/i', '/Ecosia/i',];
$isSearchEngine = false;
// 检查用户代理是否包含搜索引擎标识符
foreach ($searchEnginePatterns as $pattern) {
    if (preg_match($pattern, $userAgent)) {
        $isSearchEngine = true;
        break;
    }
}

// 如果不是iframe，就为空的字符串
$REFERER_URL = $_SERVER['HTTP_REFERER'];

// 资源类型，如果是iframe引用的，会是iframe
$SEC_FETCH_DEST = $_SERVER['HTTP_SEC_FETCH_DEST'];

// 默认没有被嵌套
$isInIframe = false;

if (isset($_SERVER['HTTP_REFERER'])) {
  $refererUrl = parse_url($_SERVER['HTTP_REFERER']);
  $refererHost = isset($refererUrl['host']) ? $refererUrl['host'] : '';

  if (!empty($refererHost) && $refererHost !== $_SERVER['HTTP_HOST']) {
    $isInIframe = true;
  }
}

// 这里通过判断$isInIframe是否为真，来处理嵌套和未嵌套执行的动作。

if ($isSearchEngine) {
    //搜索引擎
}else if($isInIframe){
    //iframe嵌套
}else{

if($_GET["url"]){
$jumpurl = base64_encode($_GET["url"]);
}else{
$jump = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$jumpurl = base64_encode($jump);
}

$baseurl = "https://your-base-domain/genshin/";
$yscookie=$_COOKIE["genshined"];
$opurl= $baseurl . "?url=" . $jumpurl;

if(isset($_COOKIE["genshined"])){
  //加载过
  if($_GET["url"]){
  //调用
  Header("Location: $opurl");
  }else{
  //不处理
  }
}else{
  Header("Location: $opurl");
}

}
?>