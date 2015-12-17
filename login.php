<?php
$uname = $_POST['uname'];
$passwd=$_POST['passwd'];

    $con = mysql_connect("localhost","root","");
    $db= mysql_select_db("microfocus", $con);

    $sql="select count(*) from user_details where (user_name='".$uname."' and user_password='".$passwd."' and status='T')";
    $query=mysql_query($sql);
    $result=mysql_fetch_array($query);

    if($result[0]>0)
    {
        session_start();
        $_SESSION['userName']=$uname;
        header("Location:components.php");
        
    }
    else{
        header("Location:index.php?v=InvalidUser");
    }

?>