<?php
if(session_status()==PHP_SESSION_NONE) session_start();
if(isset($_SESSION['admin']))
{
    if($_SESSION['admin']==1)
    {
    }
    else
    {
        header('location:login.php');
    }
}
else
{
    header('location:login.php');
}
?>
