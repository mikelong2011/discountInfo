<?php if (!defined('THINK_PATH')) exit(); defined('THINK_PATH') or die("Access denied!"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' />        
        <link rel="stylesheet" type="text/css" href="<?PHP echo C('HOME_PATH') ?>/Public/styles/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href=" <?PHP echo C('HOME_PATH') ?>/public/script/swiper3/css/swiper.min.css" />        
        <link rel="stylesheet" type="text/css" href="<?PHP echo C('HOME_PATH') ?>/Public/styles/index.css" />         
        <script src="<?php echo C('HOME_PATH') ?>/Public/script/jquery-2.js"></script>
        <script src="<?php echo C('HOME_PATH') ?>/Public/script/bootstrap.min.js"></script>   
        <script src="<?php echo C('HOME_PATH') ?>/public/script/swiper3/js/swiper.min.js"></script> 

        <title> homepage </title>
        <style>
            .section{
                margin-top:10px;
                border:1px solid #ccc;
                background-color:#fff;
            }
            .section_heading{
                border-bottom:1px solid #ccc;
                background-color:#fff;
                height:40px;text-align:
                left;line-height:40px;
                text-indent: 10px;
            }
            .section_body{
                padding:10px;
            }
            .space_span{
                border-left:5px solid #f00;
                margin-right:5px;
            }
            .nav_icon{
                height:70px;
                width:70px;
            }
        </style>
    </head>
    <body>
    <div id="wrap" class="wrap">
        <div class="head row">
            <a href="/discountinfo/index.php/home/area/getprovince">
            <div class="col-xs-3" style="overflow: hidden;white-space: nowrap;">
                <?php  $area =''; if($_SESSION['town_name']!=''){ $area = $_SESSION['town_name']; }else{ if($_SESSION['dist_name']!=''){ $area = $_SESSION['dist_name']; }else{ if($_SESSION['city_name']){ $area = $_SESSION['city_name']; }else{ if($_SESSION['prov_name']){ $area = $_SESSION['prov_name']; }else{ $area = '选择城市'; } } } } echo mb_strlen($area,'utf8')>4?mb_substr($area,0,4,'utf8'):$area; ?>  
                <span class="glyphicon glyphicon-chevron-down"></span>
            </div>
            </a>
            <div class="col-xs-6">折扣通</div>
            <div class="col-xs-3">
                搜索  <span class="glyphicon glyphicon-search"></span>
            </div>
        </div>

        <div class="space"></div>
        <div class="swiper-container lunbo" style="height:140px">
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

        <!--导航-->
        <div id="nav_bar" class="section" style="margin-top:-1px">
            <div class="section_body row">
                <?php if(is_array($typeList)): foreach($typeList as $key=>$vo): ?><div  class="col-xs-3">
                        <a href="/discountinfo/index.php/home/goods/index/type1/<?php echo ($vo['id']); ?>">
                            <img src="<?php echo C("HOME_PATH") ?>/public/uploads/type/<?php echo ($vo['id']); ?>" class="nav_icon" />
                        </a>
                        <p style="margin-top:10px"><?php echo ($vo['type_name']); ?></p>
                    </div><?php endforeach; endif; ?>
             </div>
        </div>

        <div id="recommend_brands" class="section">
            <div class="section_heading">
                <span class="space_span"></span>推荐品牌
            </div>
            <div class="section_body">
                <div class="recom_brands">
                    <div class="swiper-container swiper">
                        <div class="swiper-wrapper" >
                            <div  class="swiper-slide rb1" >图1</div>
                            <div  class="swiper-slide rb2" >图2</div>
                            <div  class="swiper-slide rb3" >图3</div>
                        </div>
                        <!-- <div class="swiper-pagination"></div> -->
                    </div>
                </div>            
            </div>
        </div>
        <div id="recommend_discount" class="section">
            <div class="section_heading">
                <span class="space_span"></span>最低1折抢大牌...
            </div>
            <div class="section_body">
                <div class="row">
                    <div class="col-xs-4">
                        <img src="#" style="max-height:200px;width:90%" />
                        <div style="width:70%;margin:0 auto;">蜘蛛王皮鞋，隔壁小王抢了三双</div>
                    </div>
                    <div class="col-xs-4">
                        <img src="#" style="max-height:200px;width:90%" />
                        <div style="width:70%;margin:0 auto;">蜘蛛王皮鞋，隔壁小王抢了三双</div>
                    </div>
                    <div class="col-xs-4">
                        <img src="#" style="max-height:200px;width:90%" />
                        <div style="width:70%;margin:0 auto;">蜘蛛王皮鞋，隔壁小王抢了三双</div>
                    </div>                    
                </div>
            </div>
        </div>


        <div id="recommend_goods" class="section">
            <div class="section_heading">
                <span class="space_span"></span>精品推荐
            </div>
            <div class="section_body">
                <div class="row">
                    <div class="col-xs-6">
                        <img src="#" style="width:100%;height:200px;" />
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-12">
                                <img src="#" style="width:100%;height:100px;" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <img src="#" style="width:100%;height:100px;" />
                            </div>
                            <div class="col-xs-6">
                                <img src="#" style="width:100%;height:100px;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="ad_bar">
                <div style="width:100%;height:100%;background-color:dodgerblue;">
                
                </div>
            </div>
            <div>
                用户id:<?php echo $_SESSION['member_id'] ?>
            </div>
        </div>

        <div class="section">
            <div class="ad_bar">
                <div style="width:100%;height:100%;background-color:#99f;"></div>
            </div>
            <div>
                广告词
            </div>            
        </div>

        <div class="section">
            <div class="ad_bar">
                <div style="width:100%;height:100%;background-color:dodgerblue;"></div>
            </div>
            <div >
                广告词
            </div>
        </div>



        <div class="footer">
            <?php include '/Public/inc/app_footer.html'; ?>
        </div>
    </div>

  <div class="space">没有更多内容了...</div>
  <div class="space"></div>

  <script>
    var mySwiper = new Swiper('.lunbo', {
        //direction: 'vertical',
        loop: true,
        autoplay:5000,
        speed:1000,
        // 如果需要分页器
        pagination: '.swiper-pagination',
        // 如果需要前进后退按钮
        //nextButton: '.swiper-button-next',
        //prevButton: '.swiper-button-prev',
        // 如果需要滚动条
        //scrollbar: '.swiper-scrollbar',
    })      

    var recomm_brands = new Swiper('.swiper', {
        loop: true,
        speed:500,
        pagination: '.swiper-pagination',
    });

  $(function(){
        var get_recomment_brands=function(){
             console.log("获取推荐品牌");
            $.ajax({
                type: "get",
                dataType: "json",
                url: '/discountinfo/index.php/home/goods/get_recommend_brands',
                success: function (data) {
                    if (data != "") {
                        //遍历对象数组，填充列表
                        //console.log(data);
                        for(var j=0;j<data.length;j++){
                            //console.log(data[j]);
                            var rbs="<div class='row'>";
                            for(var i=0;i<data[j].length;i++){
                                rbs+="<a href='/discountinfo/index.php/home/goods/index/brand/"+data[j][i].id+"'>";
                                rbs+="<div class='col-xs-4'>";
                                rbs+="<img src='#' class='nav_icon' /><br/>";
                                rbs+=data[j][i].brand_name+"</div>";
                                rbs+="</a>";
                                if((i+1)%3==0 && i>0){
                                     rbs+="</div><div class='row'>";
                                }
                            }
                            rbs+="</div>";
                            fill_slide(j+1,rbs);
                        }
                    }
                }
            });
        }();

        var get_recommend_goods =function(){
             console.log("获取推荐商品");
            $.ajax({
                type: "get",
                dataType: "json",
                url: '/discountinfo/index.php/home/goods/get_recommend_goods',
                success: function (data) {
                    if (data != "") {
                        //遍历对象数组，填充列表
                        console.log(data);
                        var rgs="<div class='row'>";
                        for(var i=0;i<data.length;i++){
                            rgs+="<a href='/discountinfo/index.php/home/goods/goods_info/id/"+data[i].id+"'>";
                            rgs+="<div class='col-xs-4'>";
                            rgs+="<img src='#' class='nav_icon' /><br/>";
                            rgs+=data[i].goods_name+"</div>";
                            rgs+="</a>";
                            if((i+1)%3==0 && i>0){
                                 rgs+="</div><div class='row'>";
                            }
                        }
                        rgs+="</div>";
                        $("#recommend_goods .section_body").html(rgs);
                    }
                }
            });            
        }();

  })
    var fill_slide = function(r,rbs){
        switch(r){
            case 1:
                $(".rb1").html(rbs);
                break;
            case 2:
                $(".rb2").html(rbs);
                break;
            case 3:
                $(".rb3").html(rbs);
                break;
        }
    }   

    </script>

<body>
</html>