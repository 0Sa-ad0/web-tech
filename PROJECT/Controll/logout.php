<?php
session_start();
if(session_destroy())
{
    header("location:../Controll/login.php");
}
?>
