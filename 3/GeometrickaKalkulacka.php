<form method="post">
    <label>Strana a</label><br>
    <input id="strana" step="any" type="number" name="stra" value="1" min="1"><br>
    <label>Strana b</label><br>
    <input id="stranb" step="any" type="number" name="strb" value="1" min="1"><br>
    <label>Geometrický útvar</label><br>
    <select onchange=strany(document.getElementById("vyber").value) id="vyber" name="tvar">
        <option value="ctverec">Čtverec</option>
        <option value="obdelnik">Obdelník</option>
        <option value="trojuhelnik">Trojúhleník</option>
    </select><br><br>
    <input value="OBSAH"type="submit" name="obsah"><br>
    <input value="OBVOD"type="submit" name="obvod"><br>
</form><script>
    function strany(co){
        var stranab = document.getElementById("stranb");
        if (co==="ctverec"){
            stranab.disabled=true;
            stranab.value="";
            stranab.title="";
        }else if (co==="obdelnik"){
            stranab.disabled=false;
            stranab.value=1;
            stranab.title="";
        }else if (co==="trojuhelnik"){
            stranab.disabled=false;
            stranab.value="";
            stranab.title="Pro výpočet rovnostraného trojúhelníku toto pole nechte prázdné. Pozor delší strana je vždy považována za rameno a kratší za základnu.";
        }
    }
    strany("ctverec");
</script>
<?php
abstract class GeometrickyUtvar{
    protected $a;
    protected $b;
    public function __construct($a,$b=null){
        $this->a=$a;
        $this->b=$b;
    }
    public function vratObsah(){
        return " má obsah: ";
    }
    public function vratObvod(){
        return " má obvod: ";
    }
}
class Ctverec extends GeometrickyUtvar {
    public function __construct($a, $b = null)
    {
        parent::__construct($a, $b);
    }

    public function vratObsah(){
        return "Tento čtverec".parent::vratObsah().$this->a**2;
    }
    public function vratObvod(){
        return "Tento čtverec".parent::vratObvod().$this->a*4;
    }
}
class Obdelnik extends GeometrickyUtvar {
    public function __construct($a, $b = null)
    {
        parent::__construct($a, $b);
    }
    public function vratObsah(){
        return "Tento obdelník".parent::vratObsah().$this->a*$this->b;
    }
    public function vratObvod(){
        return "Tento obdelník".parent::vratObvod().(($this->a*2)+($this->b*2));
    }
}
class Trojuhelnik extends GeometrickyUtvar {
    public function __construct($a,$b){
        parent::__construct($a,$b);
        if ($this->b == ""){
            $this->b=$this->a;
        }
    }
    public function vratObsah(){
        if (($this->a)<=($this->b)){
            return "Tento trojúhleník".parent::vratObsah().(($this->a/2)*((($this->b**2)-(($this->a/2)**2))**0.5))/2;
        }elseif($this->a>$this->b){
            return "Tento trojúhleník".parent::vratObsah().(($this->b/2)*((($this->a**2)-(($this->b/2)**2))**0.5))/2;
        }
    }
    public function vratObvod(){
        if (($this->a)<=($this->b)){
            return "Tento trojúhelník".parent::vratObvod().$this->a+(($this->b)*2);
        }elseif($this->a>$this->b){
            return "Tento trojúhelník".parent::vratObvod().$this->b+(($this->a)*2);
        }
    }
}
abstract class formHandler{
    public static function formHandler(){
        if(isset($_POST["obsah"]) or isset($_POST["obvod"])){
            if(isset($_POST["stra"])){
                if($_POST["tvar"]=="ctverec"){
                    $ctverec=new Ctverec($_POST["stra"],"");
                    if(isset($_POST["obsah"])){
                        echo $ctverec->vratObsah();
                    }else{
                        echo $ctverec->vratObvod();
                    }
                }elseif ($_POST["tvar"]=="obdelnik"){
                    if(isset($_POST["strb"])){
                        $obdelnik=new Obdelnik($_POST["stra"],$_POST["strb"]);
                        if(isset($_POST["obsah"])){
                            echo $obdelnik->vratObsah();
                        }else{
                            echo $obdelnik->vratObvod();
                        }
                    } else {
                        echo "Chybí strana b";
                    }
                }elseif ($_POST["tvar"]=="trojuhelnik"){
                    if(isset($_POST["strb"])){
                        $trojuhelnik=new Trojuhelnik($_POST["stra"],$_POST["strb"]);
                    }else{
                        $trojuhelnik=new Trojuhelnik($_POST["stra"],"");
                    }
                    if(isset($_POST["obsah"])){
                        echo $trojuhelnik->vratObsah();
                    }else{
                        echo $trojuhelnik->vratObvod();
                    }
                }
            }else{
                echo "Chybí strana a";
            }
        }
    }
}
formHandler::formHandler();