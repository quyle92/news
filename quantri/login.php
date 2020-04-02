<?php  
session_start();
require_once "../class/quantritin.php";
$qt = new quantritin;
var_dump($_POST);
//echo "<hr>";
print_r($_SESSION);
if (($_POST['username'])!="") { 
     $lg=$qt->thongtinuser($_POST['username'], $_POST['password']);
    if ($lg!=false) { 
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
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
            <?php 
            if(isset($_SESSION['error'])) echo $_SESSION['error'];
            ?>
    <form action="" method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In" name="submit">
    </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>