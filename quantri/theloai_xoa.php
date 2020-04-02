<?php
session_start();
require_once "../class/quantritin.php";
$qt=new quantritin;
var_dump ($idTL=$_GET['idTL']);

if ($qt->DemTinTrongTheLoai($idTL)>0) { 
    echo "<script>   alert('item is not allowed to be deleted!'); </script>";
	echo "<script>   history.go(-1) </script>";
	//die ('Ko đc xóa');
	 } 
 else { $qt->TheLoai_Xoa($idTL);  header('location: index.php?p=theloai_ds'); }
//
