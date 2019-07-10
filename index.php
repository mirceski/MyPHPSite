<!DOCTYPE HTML>
<html>

<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>

<body>

<?php
require_once "config.php";
$sql = "SELECT * FROM test.mytable;";

$result = mysqli_query($link, $sql)


?>




<form method="post" action="DisplayValues.php">

        <table>
            <tr>
                <td>Name:</td>
                <td><input type = "text" name = "name" value="">
                </td>
            </tr>

            <tr>
                <td>Surname: </td>
                <td><input type = "text" name = "surname" value="">
                </td>
            </tr>

            <tr>
                <td>Age:</td>
                <td> <input type = "number" name = "age" value="">
                </td>
            </tr>

            <tr>
                <td>E-mail:</td>
                <td><input type = "text" name = "email"></td value="">
            </tr>

            <tr>
                <td>
                    <input type = "submit" name = "submit" value = "Submit">
                </td>
            </tr>

        </table>


    <br>

    <div class="container">
        <h2>Записи во база</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_array($result)){
        echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['surname'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    </div>




</form>



</body>
</html>