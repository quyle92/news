<?php 
session_start();
session_destroy();
header('location:../quantri/login.php');
