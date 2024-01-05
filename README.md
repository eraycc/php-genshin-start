# php-genshin-start
给你的php项目添加一个原神启动页，一行代码即可调用，轻松启动原神，快乐玩耍！也可以防止恶意爬虫爬取你的网页内容，做一层简单的防护！
# 原神启动说明
## 接口说明
- 如无特殊说明，这里的php文件均指genshin目录下的php文件
### genshinstart.php
- 传参url：genshinstart.php?url=your-jump-url
- 调用后访问会将you-jump-url转化成your-base64-jump-url，然后
- 传入index.php的url参数中执行跳转【是为了得到完整的URL地址，比如&id=xxx】
- 需要修改：$baseurl = "https://your-base-domain/genshin/";

### index.php
- 传参url：index.php?url=your-jump-url或your-base64-jump-url
- 调用后即可结束动画后访问指定的URL地址

### 说明：
- 通过genshinstart.php调用后，跳转index.php会留下一个指定时间过期的cookie，该cookie可在index.php内设置，默认设置为2个小时过期，genshinstart.php会检查该cookie，如果该cookie过期或不存在则进行URL跳转，否则不跳转，即正常访问
- genshinstart.php如果不url传参数，则不执行任何操作
- index.php如果不传url参数，则默认跳转云原神
- genshinstart.php内可以自己自定义不需要执行跳转的useragent，比如针对某些搜索引擎UA
- genshinstart.php内你也可以自定义更多过滤事件和方法：比如针对某些IP数组启动调用或者不调用的策略等
### genshin静态文件.zip
- 这里面包含了路径`/genshin/`下的静态文件：
- 目录js，assets，font，image
- 解压后这些目录需要与genshinstart.php，index.php文件保持同级目录
### 调用代码：

```
<?php
/*
仅支持php调用
只需在入口php文件引用genshinstart.php即可
*/

include('genshin/genshinstart.php');

your-other-php-codes

?>

```
