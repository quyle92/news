<?php
session_start();
require_once "../class/quantritin.php";
$qt=new quantritin;
$qt->checkLogin();
$idTin=$_GET['idTin'];settype($inTin,"int");
if ($qt->DemYKienTrongTin ($idTin>0)) {
	die ("Not Allow To Delete!"); 
} ELSE { $kq=$qt->Tin_Xoa($idTin);
header('location:index.php?p=tin_ds');
}
