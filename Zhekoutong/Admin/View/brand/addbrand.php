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
        <title>品牌新增</title>
        <style rel="stylesheet">

            }
        </style>

    </head>
    <body>
        <div class="wrap">
            <?php require "/public/inc/app_header.html"; ?>       

            <div style="height:50px"></div>

            <form action="__URL__/addbrand" method="post">
            <div class="panel panel-info">
                <div class="panel-heading">品牌新增</div>
                <div class="panel-body">
                    <div class="input-group">
                        <span class="input-group-addon">品牌名称</span>
                        <input type="text" class="form-control" name="brand_name" value="" placeholder="品牌名称" maxlength="10" required="required" />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">品牌分类</span>
                        <select id="type1" name="type1" class="form-control" required="required" placeholder="请选择" >
                        </select>
                    </div>
                    <div class="input-group" >
                        <span class="input-group-addon">二级选择</span>
                        <select id="type2" name="type2" class="form-control" required="required" >
                        </select>
                    </div>
                    <div class="input-group" >
                        <span class="input-group-addon">品牌图标</span>
                        <input type="file" id='brand_image' class="form-control" />
                    </div>
                    <div class="nav_bar"></div>
                    <div class="input_bar">
                        <input type="submit" class="form-control btn btn-primary" value="确定提交" />
                    </div>
                </div>

            </div>
            </form>
        </div>
        <script>
            $(function(){
            var typeList= {$typeList};
            $("#type1").empty().append('<option></option>');
            //填充列表1
            for(var i=0;i<typeList.length;i++){
                $("#type1").append("<option>"+typeList[i].type_name+"</option>");
            }

            //填充列表2
                $("#type1").click(function(){
                    var post_data = $(this).val();
                    $.ajax({
                        type: "post",
                        dataType: "json",
                        data:{type1: post_data},
                        url: '__APP__/home/goods/get_type2',
                        success: function (data) {
                            if (data != "") {
                                //取得对象数组，填充小分类列表
                                $("#type2").html("<option></option>");
                                var type2 ="";
                                for(var i=0;i<data.length;i++){
                                    type2 +="<option>"+ (data[i].type_name)+"</option>";
                                }
                                $("#type2").append(type2);
                            }
                        }
                        
                    });

                });
                

            })

        </script>
    </body>
</html>