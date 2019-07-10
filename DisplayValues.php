<?php
require_once "config.php";
$name = $surname = $age = $email = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["name"])) {
        $name = $_POST["name"];
    }

    if (!empty($_POST["surname"])) {
        $surname = $_POST["surname"];
    }

    if (!empty($_POST["age"])) {
        $age = $_POST["age"];
    }

    if (!empty($_POST["email"])) {
        $email = $_POST["email"];
    }

    $sql = "INSERT INTO test.mytable VALUES ('', '$name', '$surname', '$age', '$email')";

    if(mysqli_query($link, $sql)){
        echo '<script type=\'text/javascript\'>alert(\'Зачувано во база\');</script>';
    }

    mysqli_close($link);
}


?>

<table>
        <tr>
            <td>Внесовте:</td>
        </tr>
        <tr>
            <td>Име:</td>
            <td><?php echo $name;?>
            </td>
        </tr>

        <tr>
            <td>Презиме: </td>
            <td><?php echo $surname;?>
            </td>
        </tr>

        <tr>
            <td>Години:</td>
            <td> <?php echo $age;?>
            </td>
        </tr>

        <tr>
            <td>E-mail:</td>
            <td><?php echo $email;?></td>
        </tr>


    </table>
