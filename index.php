<!DOCTYPE html>
<html lang="zh-CN">
    <head>
    <meta charset="UTF-8">
    <meta name="keywords" content="莆田系医院查询工具"/>
    <meta name="description" content="怎样判断医院是不是莆田系,莆田系医院名单,莆田系医院查询工具" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <script src="./js/jquery-1.12.3.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <title>莆田系医院查询工具</title>
    <style>
    body{font-family:'Microsoft YaHei';}
    h1{font-size:50px;}
    #waiting{
    display:none;
    width:200px;
    height:50px;
    padding:10px;
    position:absolute;
    text-align:center;
    top:30%;
    left:40%;
    z-index:999;
    background:#ffc;
    }
    </style>
    <script>
    function updateProgress(){
    alert();
        var waiting=document.getElementById("waiting");
        waiting.style.display="block";
    }
     
   
    function button_click(){
        var waiting=document.getElementById("waiting");
        
        var hsp=document.form.hsp.value;
        if(hsp.match("(http|https):\/\/.*"))
           hsp=hsp.split("/")[2];
        var url="handle.php";
        var xhr=null;
        if(window.XMLHttpRequest){xhr=new XMLHttpRequest();}
        else{xhr=new ActiveXObject("Microsoft.XMLHTTP");}
        xhr.open("GET",url+"?hsp="+hsp,true);
        xhr.send();
        var waiting=document.getElementById("waiting");
        waiting.style.display="block";
        xhr.onreadystatechange=function(){
           
            if(xhr.readyState==4&&xhr.status==200){
            
            waiting.style.display="none";
            document.getElementById("callback").innerHTML=xhr.responseText;
            }
        }
       
       
     }
          
      
      
    </script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">莆田系医院查询工具</a>
            </div>
        </nav>
       <div style="padding-top:48px;padding-bottom:48px;background-color:#eee;text-align:center;
">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
            <h1>
                莆田系医院查询
            </h1>
            <form onsubmit="return false" method="get" role="form" class="form-inline" name="form" autocomplete="on">
                <div class="input-group input-group-lg">
                  
                  <input type="text"  name="hsp" id="hsp" placeholder="请输入医院网址或医院名称" class="form-control"/>
                </div>
                
                <div class="input-group input-group-lg">
                    <button type="button" class="btn btn-success" onclick="button_click()">提交</button>
                </div>
            
                
            </form>
          </div>
        </div>
       </div>
        <div style="margin-top:10px;">
       <div class="container">
        <div id="callback"></div>
       </div>
        </div>
     </div>
       <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h2>工具说明：</h2>
                <p>
                  本工具的莆田系医院的列表及详细信息来源于https://github.com/open-power-workgroup/Hospital项目，该列表会随源地址文件不断更新。这个项目是开源的，如果大家遇到名单中还没有的莆田系医院（或者信息还不健全的莆田医院），可以将了解的莆田系医院名称和详细信息上传到这个项目。希望随着信息的不断丰富，大家不会再误入到莆田系医院延误最佳的治疗时机。
                </p>
              </div>
              
              <div class="col-md-4">
                <h2>如何使用？</h2>
                <p>
                  在输入框内输入想要查询的<b>医院的名称</b>或者<b>医院的网址</b>，如果输入的名称或者网址在我们收集的莆田医院的列表内，则表示这家医院就是莆田系的医院，就医前需要谨慎考虑。
                </p>
              </div>
            </div>
       </div>
    <div class="container">
      <h3>推荐一些有用的插件</h3>
      <table class="table">
        <tr><td><a href="https://github.com/wandergis/hospital-viz" target="_blank">hospital-viz</a></td><td>基于凤凰网医院的数据地图</td></tr>
        <tr><td><a href="https://github.com/hustcc/PTHospital.chrome" target="_blank">PTHospital.chrome</a></td><td>Chrome浏览器插件</td></tr>
        <tr><td><a href="https://github.com/fushenghua/GetHosp" target="_blank">GetHosp</a></td><td>一个有情怀的医院查询插件</td></tr>
        <tr><td><a href="https://github.com/FirefoxBar/userscript/tree/master/Putian_Warning" target="_blank">Putian_Warning</a></td><td>Putian Warning基于GreaseMonkey的扩展脚本</td></tr>
        <tr><td><a href="https://chrome.google.com/webstore/detail/%E8%8E%86%E7%94%B0%E7%B3%BB%E9%BB%91%E5%BF%83%E5%8C%BB%E9%99%A2%E5%90%8D%E5%8D%95%E6%8F%92%E4%BB%B6/ieogbmijfpmdlkdifblkcgomfmonmfbc?hl=zh-CN" target="_blank">莆田系黑心医院名单插件</a></td><td>一个Chrome插件，位于谷歌应用商店</td></tr>
        <tr><td><a href="https://github.com/huntbao/piggyreader" target="_blank">piggyreader</a></td><td>饥猪阅读（Piggy Reader），在用户浏览时加以提示</td></tr>
        <tr><td><a href="https://github.com/zhangjh/chromeExt" target="_blank">chromeExt</a></td><td>一个Chrome插件</td></tr>
        <tr><td><a href="https://github.com/chai2010/ptyy" target="_blank">野鸡医院</a></td><td>iOS原生应用（Go语言+Ruby语言实现），大陆常见野鸡医院查询</td></tr>
        <tr><td><a href="https://github.com/neuyu/BlackHospital" target="_blank">BlackHospital</a></td><td>Android原生应用，可以定位到用户所在城市</td></tr>
         <tr><td><a href="https://github.com/erichuang1994/PTXNotification" target="_blank">PTXNotification</a></td><td>一个Chrome插件</td></tr>
      </table>
    </div>
    <div id="waiting">正在查询请稍等...</div>
    </body>
   <footer>&copy;copyright诗雨</footer>
<html>
