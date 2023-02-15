<?php
class Cekarna{
    private $pacientipodpet=[];
    private $pacientiockovani=[];
    private $pacientinormal=[];
    public function _construct(){
        $this->pacientipodpet=[];
        $this->pacientiockovani=[];
        $this->pacientinormal=[];
    }
    public function PrichodDoCekarny($kdo){
        if ($kdo->ockovani()==1){
            array_unshift($this->pacientiockovani,$kdo);
        }elseif($kdo->vek()<6){
            array_unshift($this->pacientipodpet,$kdo);
        }else{
            array_unshift($this->pacientinormal,$kdo);
        }
        return ($kdo->kdojsem())."<br>";
    }
    public function PrichodDoAmbulance(){
        $tolik=$this->kolik();
        if(count($this->pacientiockovani)>0){
            $smazan=array_pop($this->pacientiockovani);
        }elseif(count($this->pacientipodpet)>0){
            $smazan=array_pop($this->pacientipodpet);
        }elseif(count($this->pacientinormal)>0){
            $smazan=array_pop($this->pacientinormal);
        }
        if ($tolik>0){
            return $smazan->kdojsem()."<br>";
        }else{
            return "Čekárna je prázdná.<br>";
        }
    }
    public function PocetCekajicich(){
        return "V čekárně je ".$this->kolik()." lidí.<br>";
    }
    public function kolik(){
        $kolik=(count($this->pacientinormal))+(count($this->pacientiockovani))+(count($this->pacientipodpet));
        return $kolik;
    }
}
class Pacient{
private $jmeno;
private $prijmeni;
private $vek;
private $ockovani;
    public function __construct($jmeno, $prijmeni, $vek, $ockovani){
        $this->jmeno=$jmeno;
        $this->prijmeni=$prijmeni;
        $this->vek=$vek;
        if ($ockovani=="ano"){
            $this->ockovani=1;
        }elseif ($ockovani=="ne") {
            $this->ockovani = 0;
        }
    }
    public function ockovani(){
        return $this->ockovani;
    }
    public function vek(){
        return $this->vek;
    }
    public function kdojsem(){
        return $this->jmeno." ".$this->prijmeni;
    }
}
$cekarna1=new Cekarna();
$pacientock1=new Pacient("Karel", "Novák", 15, "ano");
echo $cekarna1->PrichodDoCekarny($pacientock1);
$pacientock2=new Pacient("Ondřej","Novotný", 34, "ano");
echo $cekarna1->PrichodDoCekarny($pacientock2);
$pacientpodp1=new Pacient("Jiří", "Blažek", 4, "ne");
echo $cekarna1->PrichodDoCekarny($pacientpodp1);
$pacientpodp2=new Pacient("Alexandr", "Malý", 3, "ne");
echo $cekarna1->PrichodDoCekarny($pacientpodp2);
$pacientpodpock1=new Pacient("Vladimír", "Němec", 2, "ano");
echo $cekarna1->PrichodDoCekarny($pacientpodpock1);
$pacientnorm1=new Pacient("Petr", "Slušný", 23, "ne");
echo $cekarna1->PrichodDoCekarny($pacientnorm1);
$pacientnorm2=new Pacient("Olga", "Kašparová", 18, "ne");
echo $cekarna1->PrichodDoCekarny($pacientnorm2);
echo $cekarna1->PocetCekajicich();
echo $cekarna1->PrichodDoAmbulance();
echo $cekarna1->PrichodDoAmbulance();
echo $cekarna1->PrichodDoAmbulance();
echo $cekarna1->PrichodDoAmbulance();
echo $cekarna1->PrichodDoAmbulance();
echo $cekarna1->PocetCekajicich();
echo $cekarna1->PrichodDoAmbulance();
echo $cekarna1->PrichodDoAmbulance();
echo $cekarna1->PocetCekajicich();
