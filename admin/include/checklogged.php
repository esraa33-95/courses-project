<?php
session_start();
if(isset($_SESSION['logged']) and  $_SESSION['logged']=== true)
{
	header('location:addUser.php');
	die();
}
?>