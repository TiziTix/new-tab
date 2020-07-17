<?php
session_start();

if(isset($_POST['pseudo']) AND !empty($_POST['pseudo']))
{
    $_SESSION['pseudo'] = $_POST['pseudo'];
}

if(isset($_POST['formatClock']) AND !empty($_POST['formatClock']))
{
    $_SESSION['formatClock'] = $_POST['formatClock']; // 1 ou 2 ou 3
}

if(isset($_POST['dateFormat']) AND !empty($_POST['dateFormat']))
{
    $_SESSION['dateFormat'] = $_POST['dateFormat']; // 1 ou 2
}

if(isset($_POST['dateLetters']) AND !empty($_POST['dateLetters']))
{
    $_SESSION['dateLetters'] = $_POST['dateLetters']; // 1 ou 2
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style_settings.css">
    <title>New tab</title>
</head>
<body>
    <div id="block" class="mx-auto text-center">
    <h4 class="a"><strong>Settings</strong></h4>

        <form method="POST" action="">
            
            <div class="form-group row">
                <label for="pseudoInput" class="col-sm-2 col-form-label">Pseudo</label>
                <div class="col-sm-10">
                <input type="text" name="pseudo" class="form-control" id="pseudoInput" placeholder="Enter pseudonyme" value="<?php if(isset($_COOKIE['pseudo'])){echo $_COOKIE['pseudo'];}?>">
                </div>
            </div>
            <h5 class="a"><strong>Format</strong></h5>
            <div class="form-group row">
                <label for="formatClockInput" class="col-sm-2 col-form-label">Clock</label>
                <div class="col-sm-10">
                    <select name="formatClock" class="custom-select my-1 mr-sm-2" id="formatClockInput">
                        <option value="1">00:00:00:000</option>
                        <option value="2">00:00:00</option>
                        <option value="3" selected>00:00</option>
                    </select>                
                </div>
            </div>
            <div class="form-group row">
                <label for="dateFormatInput" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                    <select name="dateFormat" class="custom-select my-1 mr-sm-2" id="dateFormatInput">
                        <option value="1">MM/DD/YYYY</option>
                        <option value="2">DD/MM/YYYY</option>
                    </select>                
                </div>
            </div>
            <div class="form-group row">
                <label for="dateLettersInput" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <select name="dateLetters" class="custom-select my-1 mr-sm-2" id="dateLettersInput">
                        <option value="1">Letters</option>
                        <option value="2">Numbers</option>
                    </select>                
                </div>
            </div>


            <div class="text-center">
                <button type="submit" class="btn btn-primary">Confirm</button>

            </div>

        </form>

        <form action="new_tab.php">
            <input type="submit" value="back" id="back" type="button" class="btn btn-dark"/>
        </form>
    </div>





</body>
</html>