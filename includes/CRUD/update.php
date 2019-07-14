<?php

if(isset($_POST["id"]) && !empty($_POST["id"]) && isset($_POST["name"])){
    require_once "includes/config.php";

    $name = $lastName = $age = $email = "";
    $name_err = $lastName_err =  $age_err = $email_err = "";

    $id = $_POST["id"];

    // validacija za ime
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    // validacija za prezime
    $input_lastName = trim($_POST["lastName"]);
    if(empty($input_lastName)){
        $lastName_err = "Please enter last name.";
    } elseif(!filter_var($input_lastName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid last name.";
    } else{
        $lastName = $input_lastName;
    }
    // validacija za godini
    $input_age = trim($_POST["age"]);
    if(empty($input_age)){
        $age_err = "Please enter age.";
    } elseif(!filter_var($input_age, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[+]?\d+([.]\d+)?$/")))){
        $age_err = "Please enter a valid number for age.";
    } else{
        $age = $input_age;
    }

    // validacija za email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_Err = "Please enter valid email adress.";
    } elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL)){
        $email_Err = "Please enter a valid number for age.";
    } else{
        $email = $input_email;
    }

    if(empty($name_err) && empty($lastName_err) && empty($age_err) && empty($email_err)){

        $sql = "UPDATE test.vraboteni SET vraboteni.Name=?, LastName=?, Age=?, Email=? WHERE Id=?";

        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "ssssi", $param_name, $param_lastName, $param_age, $param_email, $param_id);

            $param_name = $name;
            $param_lastName = $lastName;
            $param_age = $age;
            $param_email = $email;
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                header("location: vraboteni.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }


    }

    mysqli_close($link);
}
?>

