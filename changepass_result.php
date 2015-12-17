<?php
error_reporting(0);
$uname = $_POST['user'];
$passwd=$_POST['passo'];
$npasswd=$_POST['passn'];
$nrpasswd=$_POST['passnr'];
if($npasswd!=$nrpasswd)
{
    echo "<code><font style='color:#FF0000'>New password and Re-entered password mismatch</font></code>";
}
else{
    $con = mysql_connect("localhost","root","");
    $db= mysql_select_db("microfocus", $con);

    $sql="select count(*) from user_details where (user_name='".$uname."' and user_password='".$passwd."')";
    //echo $sql;
    $sql1="UPDATE user_details SET user_password='".$npasswd."' WHERE user_name='".$uname."'";
    //echo $sql1;
    $query=mysql_query($sql);
    $result=mysql_fetch_array($query);

    if($result[0]>0)
    {
        $result1 = mysql_query($sql1);
        echo "<code><font style='color:#08C108'>Updated Successfully</font></code>";
    }
    else{
        echo "<code><font style='color:#FF0000'>Invalid User Name/Password</font></code>";
    }
}
?>