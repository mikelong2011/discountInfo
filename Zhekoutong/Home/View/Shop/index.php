<?php defined('THINK_PATH')  or die("不能直接访问文件!"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta content="yes" name="apple-mobile-web-app-capable">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' />        
        <link rel="stylesheet" type="text/css" href=" <?PHP echo C('HOME_PATH') ?>/public/styles/bootstrap.min.css" />
        <script src="<?php echo C('HOME_PATH') ?>/public/script/jquery-2.js"></script>
        <script src="<?php echo C('HOME_PATH') ?>/public/script/bootstrap.min.js"></script>   
        <link rel="stylesheet" type="text/css" href=" <?PHP echo C('HOME_PATH') ?>/public/styles/index.css" />                     
        <title>门店</title>

        <style>
            .shop-detail{
                width:100%;
                height:70%;
                position: fixed;
                top:30%;
                z-index: 20;
                overflow: scroll;
                border-top: 5px solid #ccc;
            }
        </style>
    </head>
    <body>
        <div class="wrap">
            <div class="panel panel-info">
                <div class="panel-heading">门店</div>
                <div class="space"></div>
                <div class="panel-body">
                    <div class="list">
                    <volist name="shop_list" id="vo">
                         <div class="list-item" >
                             <div class="row">
                                 <div class="col-xs-4">
                                     <img src="<?php echo C("HOME_PATH") ?>/public/uploads/shop_photo/{$vo['id']}/{$vo['image']}" class="shop-image" />
                                 </div>
                                 <div class="col-xs-8">
                                     <div class="shop_id" style="display: none">{$vo['id']}</div>
                                     <div class="title">{$vo['shop_name']}</div>
                                     <div class="desc">{$vo['desc']}</div>
                                     <div class="tel">成交/好评:{$vo['recommend']}/{$vo['recommend']}</div>
                                     <div class="tel">电话:{$vo['tel']}</div>
                                     
                                     <a href="__URL__/shop_map/shop_id/{$vo['id']}">
                                        <div class="address">
                                            地址:{$vo['address']}
                                            <span class="glyphicon glyphicon-map-marker" ></span>
                                        </div>
                                     </a>
                                 </div>
                             </div>
                             <div class="shop-detail" style="margin:10px 0 0 0;">
                                <div class="close" style="position: fixed;">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </div>
                                <div class="image-list">没有更多照片了
                                </div>
                             </div>
                         </div>
                        
                    </volist>
                    </div>
                </div>

            </div>
            <div class="space"></div>
            <div class="footer">
                <?php require "/public/inc/app_footer.html"; ?>
            </div>
        </div>
        <script>

            $(".list-item").click(function(){
                $(".shop-detail").hide();
                $(this).find(".shop-detail").show();
                var shop_id =$(this).find(".shop_id").text();
                var imgList="";
                $.ajax({
                    type:'post',
                    data:{'shop_id':shop_id},                    
                    dataType:'json',
                    url:"__URL__/get_shop_images",
                    async:false,
                    success:function(data){
                        //处理结果
                        console.log(data);
                        var url = "<?php echo C("HOME_PATH") ?>/public/uploads/shop_photo/"+shop_id+"/";
                        for(var i=0;i<data.length;i++){
                            imgList += "<img src='"+url+data[i]['image']+"' style='max-width:100%' />";
                        }
                    },
                });
                if(imgList){
                    $(this).find(".image-list").html(imgList);
                }else{
                    $(this).find(".image-list").html("没有更多照片");
                }
            })

        </script>

    </body>
</html>