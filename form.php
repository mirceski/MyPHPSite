<?php include("includes/config.php");?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include("includes/head-tag-contents.php");?>
</head>

<body>
<?php include("includes/navigation.php");
session_start();

$name = $surname = $age = $email = '';

$nameErr = $surnameErr = $ageErr = $emailErr = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valid = true;

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $valid = false;
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
            $valid = false;
        }
    }

    if (empty($_POST["surname"])) {
        $surnameErr = "Surname is required";
        $valid = false;
    } else {
        $surname = $_POST["surname"];
        if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
            $surnameErr = "Only letters and white space allowed";
            $valid = false;
        }
    }

    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
        $valid = false;
    } else {
        $age = $_POST["age"];
        if (!preg_match("/^[+]?\d+([.]\d+)?$/",$age)) {
            $ageErr = "Only positive numbers allowed";
            $valid = false;
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $valid = false;
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $valid = false;
        }
    }
    if($valid){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['surname'] = $_POST['surname'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['email'] = $_POST['email'];
        header('location:displayValues.php');
        exit();
    }
}

?>

<div class="container" style="margin-top: 50px">
<form method="post" action="">

    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" name="name" value="<?php echo $name;?>">
                <span class="error">* <?php echo $nameErr;?></span>
            </td>
        </tr>

        <tr>
            <td>Surname: </td>
            <td><input type="text" name="surname" value="<?php echo $surname;?>">
                <span class="error">* <?php echo $surnameErr;?></span>
            </td>
        </tr>

        <tr>
            <td>Age:</td>
            <td> <input type="number" name="age" value="<?php echo $age;?>">
                <span class="error">* <?php echo $ageErr;?></span>
            </td>
        </tr>

        <tr>
            <td>E-mail:</td>
            <td><input type="text" name="email" value="<?php echo $email;?>">
                <span class="error">* <?php echo $emailErr;?></span>
            </td>
        </tr>

        <tr>
            <td>
                <input type="submit" name="submit" value="Submit">
            </td>
        </tr>

    </table>

</form>
</div>

</body>

</html>
