<!DOCTYPE HTML>
<html>

<head>
    <?php include("includes/head-tag-contents.php");?>
</head>

<body>
<?php include("includes/navigation.php");
session_start();
?>

<div class="container" style="margin-top: 50px">
<table>
        <tr>
            <td>Внесовте:</td>
        </tr>
        <tr>
            <td>Име:</td>
            <td><?php echo $_SESSION['name'];?>
            </td>
        </tr>

        <tr>
            <td>Презиме: </td>
            <td><?php echo $_SESSION['surname'];?>
            </td>
        </tr>

        <tr>
            <td>Години:</td>
            <td> <?php echo $_SESSION['age'];?>
            </td>
        </tr>

        <tr>
            <td>E-mail:</td>
            <td><?php echo $_SESSION['email'];?></td>
        </tr>


    </table>

</div>
</body>

</html>