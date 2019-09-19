$str = 'IDgE';
$key = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
for($i=0;$i<10;$i++){
    echo "0 0 0 0 ";
}
for($i=0;$i<strlen($str);$i++){
    $pos = strpos($key,$str[$i]);
    echo $pos." ".$pos." 0 61 ";
}
