<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>原神，启动！</title>
		<style type="text/css">
			@font-face {
				font-family: "HYWenHei-HEW";
				src: url("./font/HYWenHei-HEW.eot");
				/* IE9 */
				src: url("./font/HYWenHei-HEW.eot?#iefix") format("embedded-opentype"),
					/* IE6-IE8 */

					url("./font/HYWenHei-HEW.woff") format("woff"),
					/* chrome、firefox */
					url("./font/HYWenHei-HEW.ttf") format("truetype"),
					/* chrome、firefox、opera、Safari, Android, iOS 4.2+ */

					url("./font/HYWenHei-HEW.svg#HYWenHei-HEW") format("svg");
				/* iOS 4.1- */
				font-style: normal;
				font-weight: normal;
			}
			
			html {
				height: 100%;
			}

			body {
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				height: 100%;
				margin: 0;
				position: relative;
				font-family: 'HYWenHei-HEW';
			}

			.logo {
				width: 50%;
				max-width: 350px;
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				animation: logoAnimation 5s ease-in-out forwards;
			}

			.text {
				text-align: center;
				position: absolute;
				bottom: 0;
				animation: textAnimation 5s ease-in-out forwards;
			}

			.text p {
				margin: 5px;
				color: rgb(104, 103, 105);
			}

			@keyframes logoAnimation {
				0% {
					opacity: 0;
				}

				20% {
					opacity: 1;
				}

				80% {
					opacity: 1;
				}

				100% {
					opacity: 0;
				}
			}

			@keyframes textAnimation {
				0% {
					opacity: 0;
				}

				10% {
					opacity: 0;
				}

				20% {
					opacity: 1;
				}

				80% {
					opacity: 1;
				}

				100% {
					opacity: 0;
				}
			}
		</style>

<!--统计代码-->
<!-- xxx -->
<!--统计代码-->

<?php
if (isset($_GET["url"])) {
    $url = $_GET["url"];
} else {
    $url = "https://ys.mihoyo.com/cloud/";
}
?>

<script type="text/javascript">
function toggleSound() {
    var music = document.getElementById("audios");//获取ID  
    if (music.paused) { //判读是否播放
       music.play(); //没有就播放 
         }
}

window.onload = function() {
//如果安装打开
function openGenshin(){
    //ios
    if (/iPad|iPhone|iPod/.test(navigator.userAgent)) {
    window.location.href = "genshinimpact://";
    //安卓
    }else if (/Android/.test(navigator.userAgent)) {
    window.location.href = "yuanshengame://";
    //鸿蒙等其它
    }else{
    window.location.href = "yuanshengame://";
    }
}
openGenshin();
toggleSound();

    };

</script>

<?php
function parseBase64URL($rawURL) {
    // 使用正则表达式检查是否为Base64编码字符串
    if (preg_match('/^[A-Za-z0-9+\/=]+\z/', $rawURL)) {
        try {
            // 解码Base64字符串
            $decodedURL = base64_decode($rawURL);

            if ($decodedURL === false) {
                throw new Exception("Invalid Base64 URL");
            }

            // 解析URL
            $urlComponents = parse_url($decodedURL);

            if ($urlComponents === false) {
                throw new Exception("Invalid URL");
            }

            return $decodedURL; // 返回解码后的URL
        } catch (Exception $e) {
            return "https://ys.mihoyo.com/cloud/"; // 返回默认URL或适当的错误处理
        }
    } else {
        return $rawURL; // 如果不是Base64编码，则返回原始字符串
    }
}
?>

<script type="text/javascript">

function openurl(){
alert("不可以嵌套使用哦！请打开："+window.location.href);
window.open(window.location.href, '_blank');
}

window.addEventListener('DOMContentLoaded', function() {
    if (window === window.top) {
        var logoElement = document.querySelector('.logo');
        logoElement.addEventListener('animationend', function() {
            var decodedURL = '<?php echo parseBase64URL($url); ?>';
            window.location.href = decodedURL;
        });
    }else{
    openurl();
    }
});
</script>
	</head>
	<body>
		<div class="logo">
			<img src="img/Genshin_Chinese_logo.svg" alt="">
		</div>
		<div class="text">
			<p>抵制不良游戏，拒绝盗版游戏，注意自我保护，谨防受骗上当，适度游戏益脑，沉迷游戏伤身，合理安排时间，享受健康生活。</p>
			<p>审批文号：国新出审[2020]1407号&nbsp;&nbsp;ISBN&nbsp;978-7-498-07852-0&nbsp;&nbsp;出版单位：华东师范大学电子音像出版社有限公司</p>
			<p>著作权人：上海米哈游天命科技有限公司</p>
			<p>本公司积极履行《网络游戏行业防沉迷自律公约》</p>
			<p>强制启动：<a href="<?php echo parseBase64URL($url); ?>" style="color: red; text-decoration:none;">OPen</a></p>
		</div>
<script>
function setCookie(cname,cvalue,chours,paths){
    var d = new Date();
    d.setTime(d.getTime()+(chours*60*60*1000));
    var expires = "expires="+d.toGMTString();
    document.cookie = cname+"="+cvalue+"; " +"path="+paths+"; "+expires;
}
//设置2小时后再次进行：原神启动
setCookie("genshined","true",2,"/");
</script>

<audio autoplay="autoplay" id="audios"><source src="./assets/genshinstart.mp3" type="audio/mp3" /></audio>
<script>
document.addEventListener('touchstart', function() {
    document.getElementById('audios').play();
});
document.addEventListener('click', function() {
    document.getElementById('audios').play();
});
</script>

	</body>
</html>
