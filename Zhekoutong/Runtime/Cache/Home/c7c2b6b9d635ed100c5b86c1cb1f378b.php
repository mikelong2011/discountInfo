<?php if (!defined('THINK_PATH')) exit(); defined('THINK_PATH') or die("不能直接访问文件!"); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <title>店铺地图</title>
    <link rel="stylesheet" href="http://cache.amap.com/lbs/static/main1119.css"/>
    <style type="text/css">
        #container{
            position:relative;
            max-width:640px;
            margin:0 auto;
            border:1px solid #ccc;
        }
        #panel,#nav {
            background-color: white;
            max-height: 90%;
            overflow-y: auto;
            top: 55px;
            z-index:2;
            position:absolute;
        }
        #panel{
            border:0;
        }
        #nav{
            height:50px;
            line-height:50px;
            top:0;
            padding-left: 1rem;
            padding-right: 1rem;
            border:1px solid #ccc;
            overflow:hidden;

        }
        .amap-logo,.amap-copyright{display:none!important;}
        #tip{top:10px;border:0;}
        .amap-geo{display: none}
    </style>

</head>
<body>
<div id="container">
    <div id="nav" >
       <button style="padding:5px;" onclick="javascript:history.back(1);">返回上页</button>
       <button style="padding:5px;" onclick="locAndRoute()" id="route">规划路线</button>
       <button style="padding:5px 10px 5px 10px;display:none" onclick="showRoute()" id="showRoute">详细路线</button>
       <div id="tip" style="display:none"></div>
       <div id="loading" style="position:fixed;right: 0;top:0;display: none">
            <img src="<?php echo C('HOME_PATH') ?>/public/images/loading.gif">
       </div>
   </div>
    <div id="panel" style="display:none"></div>
    <?php echo ($shop_info); ?>
</div>
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=b3333258e85e07eff2dada26cdac6488&plugin=AMap.Driving"></script>
<script type="text/javascript" src="http://cache.amap.com/lbs/static/addToolbar.js"></script>
<script type="text/javascript">
    
    var posArray=[[3,'112.558665','26.889962'],[6,'112.601916','26.892168']];
    var storeId =<?php echo $shop_info['id']; ?>;
    var storeName ='<?php echo $shop_info['shop_name']; ?>';
    var storeAddress ='<?php echo $shop_info['address']; ?>';
    var storeLng,storeLat;
    // for(var i=0;i<posArray.length;i++){
    //     if(posArray[i][0]==storeId){
    //         storeLng = posArray[i][1];
    //         storeLat = posArray[i][2];
    //     }
    // }
    storeLng = '<?php echo $shop_info["lng"] ?>';
    storeLat = '<?php echo $shop_info["lat"] ?>';
    console.log(storeLat+","+storeLng);
    if(!storeLng || !storeLat){
        storeLng = '112.558665';
        storeLat = '26.889962';
    };//default position

    var map = new AMap.Map("container", {
        resizeEnable: true,
        center: [storeLng,storeLat],
        zoom: 14
    });
    var infoWindow;
    var markerXunji = new AMap.Marker({
        position: map.getCenter(),
        offset:new AMap.Pixel(0, -20)
    });
    markerXunji.setMap(map);

    //在指定位置打开信息窗体
    var openInfo = function() {
        var info = [];
        info.push("<div style='padding:0;width:200px'><b style='color:#f60'>"+ storeName +"</b>");
        info.push("地址:"+storeAddress);
        info.push("</div>");
        infoWindow = new AMap.InfoWindow({
            content: info.join("<br/>"),
            offset: new AMap.Pixel(10,-10 )
        });
        infoWindow.open(map, map.getCenter());
    }();

    //定位和规划路径
     var locAndRoute = function(){
        document.getElementById('loading').style.display = "block";
        map.plugin('AMap.Geolocation', function() {
            geolocation = new AMap.Geolocation({
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0,
                convert: true,
                //showButton: true,
                //buttonPosition: 'LB',
                //buttonOffset: new AMap.Pixel(10, 20),
                showMarker: true,
                showCircle: true,
                panToLocation: true,
                zoomToAccuracy:true
            });
            map.addControl(geolocation);
            geolocation.getCurrentPosition();
            AMap.event.addListener(geolocation, 'complete', onComplete);
            AMap.event.addListener(geolocation, 'error', onError);
        });
    }
    //解析定位结果
    function onComplete(data) {
        var str=['定位成功!'];
        document.getElementById('tip').innerHTML = str;
        var markerMe = new AMap.Marker({
            position: [data.position.getLng(),data.position.getLat()]
        });
        map.remove(markerXunji);
        markerMe.setMap(map);
        markerMe.setLabel({
            offset: new AMap.Pixel(20, 20),
            content: "我的位置"
        });
        setRoute(data.position.getLng(),data.position.getLat());
    }
    function onError(data) {
        alert("定位失败！请刷新试试。")
    }

    function setRoute(lng,lat){
        var driving = new AMap.Driving({
            map: map,
            panel: "panel"
        });
        driving.search(new AMap.LngLat(lng, lat), new AMap.LngLat(storeLng, storeLat));
        document.getElementById('showRoute').style.display = "";
        document.getElementById("loading").style.display = "none";
    }
    function showRoute(){
        var panel = document.getElementById('panel');
        if(panel.style.display == "none"){
            panel.style.display ="block";
        }else{
            panel.style.display ="none";
        }
    }
</script>
</body>
</html>