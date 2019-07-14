<?php

if(isset($_POST["id"]) && !empty($_POST["id"]) && !isset($_POST["name"])){

    require_once "includes/config.php";

    $sql = "DELETE FROM test.vraboteni WHERE Id = ?";

    if($stmt = mysqli_prepare($link, $sql)){

        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = trim($_POST["id"]);

        if(mysqli_stmt_execute($stmt)){
            header("location: vraboteni.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
}
?>
