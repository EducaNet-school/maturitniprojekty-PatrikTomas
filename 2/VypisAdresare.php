<?php
function vypisadresar($adresar){
    $seznam = scandir($adresar);
    $vysledek = "";
    foreach ($seznam as $soubor){
        $vysledek.="filename: ". $soubor."<br>";
    }
    return $vysledek;
}
echo vypisadresar("C:\Users".'\t'."omap\PhpstormProjects\MP");