<?php
class Film{
    public $cena;
    public $minvek;
    public function __construct($c,$m)
    {
        $this->cena=$c;
        $this->minvek=$m;
    }
}
class Kino{
    private $film;
    private $divak;
    public function __construct($f,$d){
        $this->film=$f;
        $this->divak=$d;
    }
    public static function ProdejListku($kdo, $ktery)
    {
        try {
            if ($kdo->vek >= $ktery->minvek and $kdo->penize >= $ktery->cena) {
            echo "Lístek zakoupen";
            $novy = new Kino($kdo, $ktery);
            $kdo->penize -= $ktery->cena;
            return $novy;
            }elseif($kdo->vek<$ktery->minvek and $kdo->penize >= $ktery->cena){
                throw new vlastniExceptions("Divák nedosáhl minimálního věku pro vzhlédnutí filmu.");
            }elseif($kdo->vek >= $ktery->minvek and $kdo->penize < $ktery->cena){
                throw new vlastniExceptions("Divák nemá na lístek dostatek peněz.");
            }else{
                throw new vlastniExceptions("Divák nemá na lístek dostatek peněz a nedosáhl minimálního věku pro vzhlédnutí filmu.");
            }
        }
        catch(vlastniExceptions $chyba){
            return $chyba->hlaska();
        }
    }
}
class Divak{
    public $vek;
    public $penize;
    public function __construct($v,$p)
    {
        $this->vek=$v;
        $this->penize=$p;
    }
}
class vlastniExceptions extends Exception{
    public function hlaska(){
        $vysledek="Vyskytla se chyba na řádku ".$this->getLine()." v souboru ".$this->getFile().". ".$this->getMessage();
        return $vysledek;
    }

}

$film=new Film(200, 15);
$malykluk=new Divak(12, 50);
$chudyclovek=new Divak(28, 100);
$dospelybohatyclovek=new Divak(18, 500);
$malychudykluk=new Divak(12,50);
echo (Kino::ProdejListku($malykluk,$film))."<br>";
echo (Kino::ProdejListku($chudyclovek,$film))."<br>";
echo (Kino::ProdejListku($dospelybohatyclovek,$film))."<br>";
