<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<?php defined('THINK_PATH') or die("不能直接访问文件!"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' />        
        <title>跳转提示</title>
        <style>
            #message{
                width:80%;
                height: 150px;
                background-color: #fff;
                border:1px solid #ccc;
                position: fixed;
                top:20%;
                left: 10%;
                box-shadow: 5px 5px 20px #444;
            }
            #title{
                border-bottom: 1px solid #ccc;
                font-weight: bold;
                line-height: 40px;
                padding: 5px;
                text-align: center;
                background-color: #f7f7f7;

            }
        </style>
    </head>
    <body>

    <div id="message" >
        <div id="title">
            系统提示
        </div>
        <div style="padding: 10px;">
            <div><?php echo $message; ?></div>
            <div style="color:red"><?php echo $error; ?></div>
        </div>
        <br />
        <div style="text-align: center;">
            <button id="btn" onclick="go()" >我知道了(<?php echo $waitSecond;?>)</button>
        </div>

    </div>

    <script type="text/javascript">
    	var wait 	= <?php echo $waitSecond ?>;
    	var href	= '<?php echo $jumpUrl ?>';
    	var message = '<?php echo $message ?>';
    	var error 	= '<?php echo $error ?>';

        setInterval(function(){
            document.getElementById("btn").innerHTML = '我知道了('+wait+')';
            --wait;
            if(!wait){
                location.href = href;
                clearInterval(this);
            }
        },1000);
        var go = function(){
            location.href = href;
        }
    </script>
</body>
</html>