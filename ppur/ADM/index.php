<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
    $session_id=$_SESSION["id"];
    if($session_id==null)
    {
    header ("location:login.php");
    }
    else
    {
    header ("location:control.php");
    }
?>