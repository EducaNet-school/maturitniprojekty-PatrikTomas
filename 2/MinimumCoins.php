<?php
function tridic($suma){
    $odcitadlo=$suma;
    $delitele=[1,2,5,10,20,50,100,200,500,1000];
    $vysledek=[];
    $zprava="";
    for($i=count($delitele)-1;$i>-1;$i-=1){
        if (($odcitadlo/$delitele[$i])>=1){
            $posli=floor($odcitadlo/$delitele[$i]);
            array_push($vysledek, $posli);
            $odcitadlo-=$posli*$delitele[$i];
        }else{
            array_push($vysledek, 0);
        }
    }
     $bankovky=9;
    for($i=0;$i<count($vysledek);$i++){
        $zprava.= $delitele[$bankovky].": ".$vysledek[$i]."<br>";
        $bankovky-=1;
    }
    return $zprava;
}
echo tridic(5001);