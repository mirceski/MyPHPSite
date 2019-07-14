<?php include("includes/config.php");?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include("includes/head-tag-contents.php");?>
</head>

<body>
<?php include("includes/navigation.php");

$brojki = [13, 7 , 16 , 23, 29, 76, 54, 22, 50, 4, 8, 13];

$employees = [
    ['name' => 'Igor Stojkoski',
    'position' => 'intern',
    'started' => '2019'
    ],

    ['name' =>'Milan Spasovski',
    'position' => 'intern',
    'started' => '2019'
    ],

    ['name' => 'Mile Mircheski',
    'position' => 'developer',
    'started' => '2018'
    ]
];

$colors = ['blanchedalmond',
    'lightsalmon',
    'burlywood',
    'lemonchiffon',
    'hotpink',
    'papayawhip'
];

$countries_capitals= array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg",
    "Belgium"=> "Brussels", "Denmark"=>"Copenhagen",
    "Finland"=>"Helsinki", "France" => "Paris",
    "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana",
    "Germany" => "Berlin", "Greece" => "Athens",
    "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam",
    "Portugal"=>"Lisbon", "Spain"=>"Madrid",
    "Sweden"=>"Stockholm", "United Kingdom"=>"London",
    "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius",
    "Czech Republic"=>"Prague", "Estonia"=>"Tallin",
    "Hungary"=>"Budapest", "Latvia"=>"Riga","Malta"=>"Valetta",
    "Austria" => "Vienna", "Poland"=>"Warsaw") ;


foreach($employees as $employee){
    foreach($employee as $key=>$value){
        echo ucfirst($key). " : " . $value . "<br />";
    }
}

echo "<br/><br/>";

for ($i = 0; $i < count($brojki); $i++) {
    echo "$brojki[$i] : " ;
    if ($brojki[$i] % 2 == 0) {
        echo "paren\n" . "<br />";
    }
    else {
        echo "neparen\n" . "<br />";
    }
}

echo "<br/><br/>";

echo "<table>";
echo "<tr> <th>Colors</th></tr>";
foreach($colors as $color) {
    echo "<tr bgcolor='$color'><td>$color</td></tr>";
}
echo "</table>";

echo "<br/><br/>";

asort($countries_capitals);
foreach($countries_capitals as $key=>$value){
    echo "The Capital of " . $key . " is " . $value . "<br />";

}



?>

</body>