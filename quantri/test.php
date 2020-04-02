<?php  
session_start();
require_once "../class/quantritin.php";
$qt = new quantritin;
var_dump($_POST);
//echo "<hr>";
print_r($_SESSION);
if (isset($_POST['username'])) {
    $lg=$qt->thongtinuser($_POST['username'], $_POST['password']);
    if ($lg) {
        $row=$lg->fetch_assoc();
        $_SESSION['login_id'] = $row['idUser'];   
        $_SESSION['login_level'] = $row['idGroup'];
            if(strlen($_SESSION['back'])>0) { 
            $back= $_SESSION['back']; 
            unset($_SESSION['back']);
            header("location:$back");	    
        } else header("location: index.php");
    } 
    else { header('location:login.php');}
}
//if (isset($_SESSION['login_id'])==false) {echo $_SESSION['error']="Chưa log in!";}
//elseif ($_SESSION['login_level']!=1) echo $_SESSION['error']="Ko được quyền vào đây!";
?>