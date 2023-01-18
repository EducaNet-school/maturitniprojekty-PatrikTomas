<?php
abstract class Auto{
private $typ;
private $znacka;
public function __construct($typ, $znacka){
    $this->typ=$typ;
    $this->znacka=$znacka;
}
public function vratInfo(){
    return "Typ: ".$this->typ." Značka: ".$this->znacka;
}
}
class Nakladak extends Auto{
    private $nosnost;
    public function __construct($typ, $znacka, $nosnost){
        $this->nosnost=$nosnost;
        parent:: __construct($typ, $znacka);
    }
    public function vratInfo(){
        return parent::vratInfo() . " Nosnost: " . $this->nosnost;
    }
}
class ElektrickeAuto extends Auto{
    private $vydrzbaterie;
    public function __construct($typ, $znacka, $vydrzbaterie){
        $this->vydrzbaterie=$vydrzbaterie;
        parent:: __construct($typ, $znacka);
    }
    public function vratInfo(){
        return parent::vratInfo() . " Výdrž baterie: " . $this->vydrzbaterie;
    }
}
$seznam=[];
$prom=new Nakladak("Náklaďák","Volvo","20 tun");
$prom1=new ElektrickeAuto("Osobní auto","Tesla","500 km");
array_push($seznam,$prom,$prom1);
foreach ($seznam as $jeden){
    echo $jeden->vratInfo() . "<br>";
}