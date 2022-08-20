<?php

session_start();
$userid=$_SESSION['userid'];
include ('mysqli_connect.php');

$state=$_GET['id'];

if($state==1){
    $sql="update reader_card set card_state=0 where reader_id={$userid}";
    $res=mysqli_query($dbc,$sql);

    if($res==1)
    {
        echo"<script>alert('I know it！')</script>";
        echo "<script>window.location.href='reader_guashi.php'</script>";
    }
    else
    {
        echo"<script>alert('WOO-HOO！')</script>";
        echo "<script>window.location.href='reader_guashi.php'</script>";
    }

}
else{

    $sqla="update reader_card set card_state=1 where reader_id={$userid}";
    $resa=mysqli_query($dbc,$sqla);

    if($resa==1)
    {
        echo"<script>alert('Good good！')</script>";
        echo "<script>window.location.href='reader_guashi.php'</script>";
    }
    else
    {
        echo"<script>alert('HOWL！')</script>";
        echo "<script>window.location.href='reader_guashi.php'</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

</body>
</html>
