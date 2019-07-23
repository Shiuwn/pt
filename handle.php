<?php
header("Content-type:text/html;charset=utf-8");
if(!isset($_GET['hsp'])||empty($_GET['hsp']))
    die();
$hsp=addslashes($_GET['hsp']);

$filename="https://raw.githubusercontent.com/open-power-workgroup/Hospital/master/resource/API_resource/hospital_list.json";

@$json=file_get_contents($filename);
$jarr=json_decode($json,true);


$result=jst($hsp);
switch($result){

case 1: 
    handle_name($hsp,$jarr);
    break;
case 2:
    handle_url($hsp,$jarr);
    break;
default:
    echo "<div class='alert alert-warning'>";
    echo "不能确定"."<b>".$hsp."</b>"."是莆田系医院，请尽可能的收集更多资料！";
    echo "本工具只能输入两个以上的汉字或网址，请确认是否输入正确！";
    echo"</div>";
}





//判断输入字符串是医院名或网址
function jst(&$hsp){
    if(preg_match("/^[\x7f-\xff]{8,}$/",$hsp)){
        return 1;
    }else{
        if(preg_match("/(www\.)?(\w+)[\.](com|cc|net|org|biz|xyz|cn|com\.cn|net\.cn)/",$hsp))
            return 2;
        else{
            return 0;
        }
    }
}
//对输入的医院名称的处理
function handle_name($hsp,array $jarr){
    $kk='';
    $shospital='';
    foreach($jarr as $key=>$value){//取出城市和医院
        if(empty($kk)){
            foreach(array_keys($value) as $svalue){
                //echo $svalue;
            
            if(preg_match("/".$hsp."/",$svalue)){
                $shospital=$svalue;
                $kk=$key;
                break;    
            }
          }
        }else{break;}
         
    }
    
    if(!empty($kk)){//城市非空则表示已经找到了莆田系医院
    
        echo "<div class='alert alert-danger'>";
        echo "为您搜索到";
        echo "<b>".$shospital."</b>"."是莆田系医院，就医需谨慎！";
        echo "</div>";
        if(count($jarr[$kk][$shospital])){
        echo "<table class='table table-bordered'>";
        foreach($jarr[$kk][$shospital] as $key1=>$value1){
            
            if(count($value1)){
                foreach($value1 as $value2){
                    echo "<tr>";
                    echo "<td>".$key1."</td>";
                    echo "<td>".$value2."</td>";
                    echo "</tr>";
                    }
                }
               
            }
        echo "</table>";
    }
    }else{
        echo "<div class='alert alert-warning'>";
        echo "不能确定"."<b>".$hsp."</b>"."是莆田系医院，请尽可能的收集更多资料！";
        echo"</div>";
    }
}

function handle_url($hsp,array $jarr){
    $newjarr=array();
    $keys=array();
  foreach($jarr as $key=>$values){
    $newjarr[$key]=array_keys($values);
  }
    foreach($newjarr as $key=>$values){//$values为医院信息数组，$key为省份名称
      if(count($values)){
        foreach($values as $value){//$value为某个医院的信息数组
         $info=$jarr[$key][$value];
         if(count($info)&&array_key_exists('网址',$info)){
             if(count($info['网址'])){
                foreach($info['网址'] as $d){
                   if(preg_match("/".$hsp."/",$d)){
                       $keys=array($key,$value,$d);
                   }
                }
            }
         }else{
           continue;
         }
        }
      }else{continue;}   
    }
  if(count($keys)){
    
    echo "<div class='alert alert-danger'>";
    echo $keys[2]." 是".$keys[1]."的网址 ";
    echo "<b>".$keys[1]."</b>"."是莆田系医院，就医需谨慎！";
    echo "</div>";
    echo "<table class='table table-bordered'>";
    foreach($jarr[$keys[0]][$keys[1]] as $key1=>$value1){
      if(count($value1)){
        foreach($value1 as $value2){
           echo "<tr>";
           echo "<td>".$key1."</td>";
           echo "<td>".$value2."</td>";
           echo "</tr>";
         }
       }
               
     }
     echo "</table>";
    
}else{
  echo "<div class='alert alert-warning'>";
  echo "不能确定"."<b>".$hsp."</b>"."是否是莆田系医院，请尽可能的收集更多资料！";
  echo"</div>";
}
}
?>
