<?php
session_start();

if(isset($_SESSION['pseudo']))
{
    setcookie('pseudo',$_SESSION['pseudo'],time()+365*24*3600,null,null,false,true);
}
if(isset($_SESSION['formatClock']))
{
    setcookie('formatClock',$_SESSION['formatClock'],time()+365*24*3600,null,null,false,true);
}
if(isset($_SESSION['dateFormat']))
{
    setcookie('dateFormat',$_SESSION['dateFormat'],time()+365*24*3600,null,null,false,true);
}
if(isset($_SESSION['dateLetters']))
{
    setcookie('dateLetters',$_SESSION['dateLetters'],time()+365*24*3600,null,null,false,true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>New tab</title>
</head>
<body>




<div id="MainBlock">
        <div class="text-center"><h1 id="time"></h1><span id="badge" class="badge badge-secondary">PM</span></div>
        <h4 id="date" class="text-center"></h4>
        <form action="new_tab_settings.php">
            <input type="submit" value="edit" id="edit" type="button" class="btn btn-outline-light"/>
        </form>
        
        <h5 id="Welcome" class="text-center">Welcome <?php  echo $_SESSION['pseudo'];?> !</h5>

</div>
    
    <script>


        var format = <?php echo json_encode($_COOKIE['formatClock']); ?>;
        var X=0;
        //var hide = false;
        //var formatHours = false;
        //var minusHours = 0;
        var DateLetters =<?php echo json_encode($_COOKIE['dateLetters']); ?>;
        var DateFormat =<?php echo json_encode($_COOKIE['dateFormat']); ?>;
        $("#badge").hide();
        $("#settings").hide();
        var months = ['January', 'February', 'March','April','May','April','June','August','September','October','November','December'];

//Refresh une seule fois
        window.onload = function() {
            if(!window.location.hash) {
                window.location = window.location + '#loaded';
                window.location.reload();
            }
        }
        
        $( document ).ready(function() {
            console.log( "ready!" );

        });

        
        setInterval(function() {
            if(true) {
                    var d = new Date();
                    //Timer
                    h = d.getHours();
                    if(h >= 12){
                        h = h - minusHours;
                    }
                    min = d.getMinutes();
                    s = d.getSeconds();
                    milli = d.getMilliseconds();
                    //Date
                    y = d.getFullYear();
                    m = d.getMonth() + 1;
                    d = d.getDate();


                    if(h<10){
                        h = '0'+h;
                    }
                    if(min<10){
                        min = '0'+min;
                    }
                    if(s<10){
                        s = '0'+s;
                    }
                    if(d<10){
                        d = '0'+d;
                    }
                    if(m<10){
                        m = '0'+m;
                    }
                    if(DateLetters == 1){
                        for (let i = 1; i < 13; i++) {
                            var T;
                            if(i<10){
                                T='0'+i;
                            }
                            if(T==m){
                                m=months[i];
                            }
                            if(DateFormat == 2){
                                document.getElementById("date").innerHTML = d + " " + m + ", " + y;
                            }else{
                                document.getElementById("date").innerHTML = m + " " + d + ", " + y;
                            }

                        }
                    }else{
                        if(DateFormat == 2){
                            document.getElementById("date").innerHTML = d + "/" + m + "/" + y;
                        }else{
                            document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
                        }
                    }
                    if(format == 1){
                        document.getElementById("time").innerHTML = h+':'+min+':'+s+':'+milli;
                        X=0;
                    }else if(format ==2){
                        document.getElementById("time").innerHTML =  h+':'+min+':'+s;
                        X=500;
                    }else{
                        document.getElementById("time").innerHTML =  h+':'+min;
                        X=5000;
                    }

                }
        }, X); // Wait Xms before running again

    </script>


</body>
</html>