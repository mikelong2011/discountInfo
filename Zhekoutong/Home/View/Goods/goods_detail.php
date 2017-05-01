<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' />        
        <link rel="stylesheet" type="text/css" href=" <?PHP echo C('HOME_PATH') ?>/public/styles/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href=" <?PHP echo C('HOME_PATH') ?>/public/styles/index.css" />   
        <link rel="stylesheet" type="text/css" href=" <?PHP echo C('HOME_PATH') ?>/public/script/swiper3/css/swiper.min.css" />   
        <script src="<?php echo C('HOME_PATH') ?>/public/script/jquery-2.js"></script>
        <script src="<?php echo C('HOME_PATH') ?>/public/script/bootstrap.min.js"></script>   
        <script src="<?php echo C('HOME_PATH') ?>/public/script/swiper3/js/swiper.min.js"></script>         
                   
        <title>商品详情</title>
        <style rel="stylesheet">
        </style>

    </head>
    <body>
        <div class="wrap">
	        <div class="swiper-container" style="height:350px">
	            <div class="swiper-wrapper">
	                <div class="swiper-slide" style="background-color:#f00">图1</div>
	                <div class="swiper-slide" style="background-color:#0f0">图2</div>
	                <div class="swiper-slide" style="background-color:#00f">图3</div>
	                <div class="swiper-slide" style="background-color:#ff0">图4</div>
	                <div class="swiper-slide" style="background-color:#0ff">图5</div>                    
	            </div>
	            <div class="swiper-pagination"></div>
	            <!--
	            <div class="swiper-button-prev"></div>
	            <div class="swiper-button-next"></div>
	            <div class="swiper-scrollbar"></div>
	            -->
	        </div>                
        	<div class="panel panel-collapse"> 
        		<div class="panel-body">
			
        		</div>
        	</div>

       	</div>
		<script type="text/javascript">
		    var mySwiper = new Swiper('.swiper-container', {
		        //direction: 'vertical',
		        loop: true,
		        autoplay:3000,
		        speed:1000,
		        // 如果需要分页器
		        pagination: '.swiper-pagination',
		        // 如果需要前进后退按钮
		        //nextButton: '.swiper-button-next',
		        //prevButton: '.swiper-button-prev',
		        // 如果需要滚动条
		        //scrollbar: '.swiper-scrollbar',
		    })    			
		</script>   	
    </body>
    </html>

