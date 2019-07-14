<?php include("includes/config.php");?>
<!DOCTYPE HTML>
<html>

<head>
    <?php include("includes/head-tag-contents.php");?>
</head>

<body>
<?php include("includes/navigation.php");?>

<div class="container">
    <h2>Изберете јадење</h2>

    <form method="post" action="ordered.php">
        <div class="row">
        <label class="radio-inline">
            <input type="radio" name="optradio" value="Giro">Гиро
        </label>
        <label class="radio-inline">
            <input type="radio" name="optradio" value="Salata">Салата
        </label>
        <label class="radio-inline">
            <input type="radio" name="optradio" value="Vrap">Врап
        </label>
        <label class="radio-inline">
            <span style="color:#FF0000;"> - главно јадење</span>
        </label>
        </div>

        <div class="row">
        <label class="checkbox-inline">
            <input type="checkbox" class="chkBox" name="MajonezChk" value="Majonez" disabled>Мајонез:
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" disabled class="chkBox" name="KecapChk" value="Kecap">Кечап:
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" disabled class="chkBox" name="SenfChk" value="Senf">Сенф:
        </label>
            <label class="radio-inline">
                <span style="color:#FF0000;"> - додаток</span>
            </label>
        </div>

        <div class="row">
            <label class="checkbox-inline">
                <input type="checkbox" class="chkBox" name="PomfritChk" value="Pomfrit" disabled>Помфрит:
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" class="chkBox" name="PavlakaChk" value="Pavlaka" disabled>Павлака:
            </label>
            <label class="checkbox-inline">
                <input type="checkbox"  class="chkBox" name="PestoChk" value="Pesto" disabled>Песто:
            </label>
            <label class="radio-inline">
                <span style="color:#FF0000;"> - екстра додаток</span>
            </label>
        </div>
        <div class="row">
         <input type="submit" id="submit" name="submit" disabled value="Submit">
        </div>



    </form>
</div>

<script type="text/javascript">

    $("input[type='radio']").click(function(){
        $("input.chkBox").removeAttr("disabled");
        $('input[type="submit"]').removeAttr('disabled');
    });

    $("#submit").click(function(event) {
        if( !confirm('Дали сте сигурни дека сакате да нарачате?') ){
            event.preventDefault();
        }
    });

</script>



</body>