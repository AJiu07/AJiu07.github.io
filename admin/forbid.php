<?php
@session_start();
if(!$_SESSION['name']){
  header('location: login.php');
}