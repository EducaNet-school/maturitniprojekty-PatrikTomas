<?php
function selectionSort($text){
    $seznam=explode(",",$text);
    for($i=0;$i<count($seznam);$i++){
        $nejmensi=$i;
        for($x=$i;$x<count($seznam)-1;$x++){
            if($seznam[$nejmensi]>$seznam[$x+1]){
                $nejmensi=$x+1;
            }
        }
        $temp=$seznam[$i];
        $seznam[$i]=$seznam[$nejmensi];
        $seznam[$nejmensi]=$temp;
    }
    return $text. "-->" .implode(", ", $seznam);

}
function bubbleSort($text){
    $seznam=explode(",",$text);
    echo count($seznam);
    for($i=0;$i<count($seznam)-1;$i++){
        for($x=$i;$x<count($seznam)-1;$x++){
            if($seznam[$x]>$seznam[$x+1]){
                $temp=$seznam[$x+1];
                $seznam[$x+1]=$seznam[$x];
                $seznam[$x]=$temp;
            }
        }
    }
    return $text. "-->" .implode(", ", $seznam);
}
function bonus1($text){
    $pismenka=str_split($text);
    $sifra=[];
    for($i=0;$i<count($pismenka)-1;$i+=4){
        array_push($sifra,$pismenka[$i]);
    }
    for($i=1;$i<count($pismenka)-1;$i+=2){
        array_push($sifra,$pismenka[$i]);
    }
    for($i=2;$i<count($pismenka)-1;$i+=4){
        array_push($sifra,$pismenka[$i]);
    }
    return implode($sifra);
}
function bonus2($text){
    $pismenka=str_split($text);
    $original=[];
    $radek1=[];
    $radek2=[];
    $redek3=[];
    for($i=0;$i<floor((count($pismenka)-1)/4)+1;$i++){
        array_push($radek1,$pismenka[$i]);
    }
    for($i=1;$i<count($pismenka)-1;$i+=2){
        array_push($sifra,$pismenka[$i]);
    }
    for($i=2;$i<count($pismenka)-1;$i+=4){
        array_push($sifra,$pismenka[$i]);
    }
    return implode($sifra);
}
echo selectionSort("15,75,20,1,68");
echo "<br>";
echo bubbleSort("2,6,58,99,47,3");
echo "<br>";
echo bonus1("Zdar Karle");
echo "<br>";