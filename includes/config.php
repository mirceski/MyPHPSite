<?php

define('DB_SERVER', 'localhost:3307');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'test');


$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$cenovnik = [
    'Giro' => '300',
    'Salata' => '450',
    'Wrap' => '150',
    'Majonez' => '50',
    'Kecap' => '50',
    'Senf' => '50',
    'Pomfrit' => '20',
    'Pavlaka' => '20',
    'Pesto' => '20'
];

?>
