<?php include("includes/config.php");?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include("includes/head-tag-contents.php");?>
</head>

<body>
<?php include("includes/navigation.php");?>

<?php

$glavnaNaracka = "";
$dodatok = [];
$extraDodatok = [];
$vkupnoZaNaplata = 0;

$meni = array(
    "Glavno jadenje" => array("Giro", "Salata", "Wrap"),
    "Dodatok" => array("Majonez", "Kecap", "Senf"),
    "Extra Dodatok" => array("Pomfrit", "Pavlaka", "Pesto")
);

if(isset($_POST["optradio"])){
    $glavnaNaracka = $_POST['optradio'];
    if (array_key_exists($glavnaNaracka, $cenovnik)) {
        $vkupnoZaNaplata = $cenovnik[$glavnaNaracka];
    }
}

if(isset($_POST["MajonezChk"])){
    array_push($dodatok, $_POST['MajonezChk']);
    if (array_key_exists($_POST['MajonezChk'], $cenovnik)) {
        $vkupnoZaNaplata += $cenovnik[$_POST['MajonezChk']];
    }
}

if(isset($_POST["KecapChk"])){
    array_push($dodatok, $_POST['KecapChk']);
    if (array_key_exists($_POST['KecapChk'], $cenovnik)) {
        $vkupnoZaNaplata += $cenovnik[$_POST['KecapChk']];
    }
}

if(isset($_POST["SenfChk"])){
    array_push($dodatok, $_POST['SenfChk']);
    if (array_key_exists($_POST['SenfChk'], $cenovnik)) {
        $vkupnoZaNaplata += $cenovnik[$_POST['SenfChk']];
    }
}

if(isset($_POST["PomfritChk"])){
    array_push($extraDodatok, $_POST['PomfritChk']);
    if (array_key_exists($_POST['PomfritChk'], $cenovnik)) {
        $vkupnoZaNaplata += $cenovnik[$_POST['PomfritChk']];
    }
}

if(isset($_POST["PavlakaChk"])){
    array_push($extraDodatok, $_POST['PavlakaChk']);
    if (array_key_exists($_POST['PavlakaChk'], $cenovnik)) {
        $vkupnoZaNaplata += $cenovnik[$_POST['PavlakaChk']];
    }
}

if(isset($_POST["PestoChk"])){
    array_push($extraDodatok, $_POST['PestoChk']);
    if (array_key_exists($_POST['PestoChk'], $cenovnik)) {
        $vkupnoZaNaplata += $cenovnik[$_POST['PestoChk']];
    }
}

?>


<div class="container" style="margin-top: 50px">

    <p>Naracavte: <?php echo $glavnaNaracka . "</br>";
            if (!empty($dodatok)) {
                echo "So dodatok: ";
                foreach ($dodatok as $item) {
                    echo $item . ";";
                }
            }
        if (!empty($extraDodatok)) {
            echo "</br>" . "I ekstra dodatok: ";
            foreach ($extraDodatok as $item) {
                echo $item . ";";
            }
        };

        echo "</br>" . "Vkupno za naplata: " . $vkupnoZaNaplata;

        ?></p>

</div>


</body>