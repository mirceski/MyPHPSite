<?php
    include("includes/config.php");
    include("includes/CRUD/create.php");
    include("includes/CRUD/update.php");
    include("includes/CRUD/delete.php");
    ?>

<!DOCTYPE HTML>
<html>

<head>
    <?php include("includes/head-tag-contents.php");?>
</head>

<body>
<?php include("includes/navigation.php");?>

<div class="container">

    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div style="margin-bottom: 10px">
                    <a href="#addVrabotenModal" class="btn btn-success btn-md" style="display: flex" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span> Dodadi Nov Zapis</span></a>
                </div>
            </div>
        </div>
        <?php
        $sql = "SELECT * FROM test.vraboteni";

        if($result = mysqli_query($link, $sql)){
            $num_rows = mysqli_num_rows($result);
            if(mysqli_num_rows($result) > 0){
                echo "<table class='table table-bordered table-striped'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>#</th>";
                echo "<th>Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>Age</th>";
                echo "<th>Email</th>";
                echo "<th>Action</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                $rowNum = 1;
                while($row = mysqli_fetch_array($result)){
                    echo "<tr id=" . $row['Id'] . ">";
                    echo "<td>" . $rowNum . "</td>";
                    echo "<td data-target=\"name\">" . $row['Name'] . "</td>";
                    echo "<td data-target=\"lastName\">" . $row['LastName'] . "</td>";
                    echo "<td data-target=\"age\">" . $row['Age'] . "</td>";
                    echo "<td data-target=\"email\">" . $row['Email'] . "</td>";
                    echo "<td style='width: 40px;'>";
                    echo "<a href=\"#\" class=\"edit\" data-role=\"update\" data-id=" . $row['Id'] . " data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Edit\">&#xE254;</i></a>";
                    echo "<a href=\"#\" class=\"delete\" data-role=\"delete\" data-id=" . $row['Id'] . " data-toggle=\"modal\"><i class=\"material-icons\" data-toggle=\"tooltip\" title=\"Delete\">&#xE872;</i></a>";
                    echo "</td>";
                    echo "</tr>";
                    $rowNum++;
                }
                echo "</tbody>";
                echo "</table>";
                echo "<div class=\"clearfix\">
                        <div class=\"hint-text\">Vkupen broj na zapisi: <b>" . $num_rows . "</b></div>
                       </div>";
                mysqli_free_result($result);
            } else{
                echo "<p class='lead'><em>No records were found.</em></p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        mysqli_close($link);
        ?>

    </div>
</div>

<!-- Create Modal HTML -->
<div id="addVrabotenModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Dodadi Vraboten</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" name="age" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Otkazi">
                    <input type="submit" name="submit" class="btn btn-success" value="Dodadi">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editVrabotenModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Izmeni vraboten</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="number" name="age" id="age" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Otkazi">
                    <input type="submit" class="btn btn-info" value="Zacuvaj">
                </div>
                <input type="hidden" id="userId" name="id" class="form-control">
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteVrabotenModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Izbrisi Vraboten</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Dali ste sigurni deka sakate da go izbrisete zapisot?</p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Otkazi">
                    <input type="submit" class="btn btn-danger" value="Izbrisi">
                </div>
                <input type="hidden" id="userIdDelete" name="id" class="form-control">
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

$(document).on('click','a[data-role=update]',function(){
var id  = $(this).data('id');
var name  = $('#'+id).children('td[data-target=name]').text();
var lastName  = $('#'+id).children('td[data-target=lastName]').text();
var age  = $('#'+id).children('td[data-target=age]').text();
var email  = $('#'+id).children('td[data-target=email]').text();

$('#name').val(name);
$('#lastName').val(lastName);
$('#age').val(age);
$('#email').val(email);
$('#userId').val(id);
$('#editVrabotenModal').modal('toggle');
});

$(document).on('click','a[data-role=delete]',function(){
    var id  = $(this).data('id');

    $('#userIdDelete').val(id);
    $('#deleteVrabotenModal').modal('toggle');
});

});
</script>

</body>
