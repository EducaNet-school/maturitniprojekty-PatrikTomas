<form method="post">
    <label>Jméno a příjmení</label>
    <input type="text" name="jmenaprijm">
    <br>
    <label>Adresa</label>
    <input type="text" name="adres">
    <br>
    <input type="submit" name="poslal">
</form>
<?php
if (isset($_POST["poslal"])){
    if (strlen($_POST["jmenaprijm"])<1){
        echo "<p style='color:red'>Vyplňte prosím jméno a příjmení.</p>";
    }elseif(count(explode(" ", $_POST["jmenaprijm"]))!=2){
        echo "<p style='color:red'>Špatně zadané jméno a příjmení.</p>";
    }
    if (strlen($_POST["adres"])<1){
        echo "<p style='color:red'>Vyplňte prosím adresu.</p>";
    }elseif(strlen($_POST["adres"])<10){
        echo "<p style='color:red'>Adresa je příliš krátká.</p>";
    }
}