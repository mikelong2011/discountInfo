<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
<?php defined('THINK_PATH')  or die("不能直接访问文件!"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' />        
        <script src="<?php echo C('HOME_PATH') ?>/public/script/jquery-2.js"></script>
        <script src="<?php echo C('HOME_PATH') ?>/public/script/layer/layer.js"></script>   
        <title>跳转提示</title>
    </head>
    <body>
    <div class="wrap">
	<?php //echo $message.','.$error.','.$jumpUrl.','.$waitSecond ?>

</div>
<script type="text/javascript">
(function(){
	var wait 	= <?php echo $waitSecond ?>;
	var href	= '<?php echo $jumpUrl ?>';
	var message = '<?php echo $message ?>';
	var error 	= '<?php echo $error ?>';

    layer.open({
        title: '提示消息:'
        ,time:2000
        ,content: error+message
        ,end:function(){
            location.href = href;
        }
    }); 

})();
</script>
</body>
</html>
