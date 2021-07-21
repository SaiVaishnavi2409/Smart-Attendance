<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background-color: #222D32;">
    
<div class="container">
        <div class="row" style="margin-top: 5rem;">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <!-- <i class="fa fa-key" aria-hidden="true"></i> -->
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                   Smart Attendance
                </div>
              <div class="wrapper">
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form name="form" METHOD ="POST" action="" class="frm">
                            <div class="form-group">
                              <label class="form-control-label"><h5>USER NAME :</h5></label>
                                <input type="text" class="form-control" name="username"  maxlength=10 required>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label"><h5>PASSWORD :</h5></label>
                                <input type="password" class="form-control"  name="password" required>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit"  name="Login" class="btn btn-outline-primary">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
        </div>





    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
<?php
include('sanitize.php');
include("dbcon2.php");
if (isset($_POST['Login'])) {
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $con = mysqli_connect("localhost", "root", "", "attendance");
    $sql = $con->prepare("SELECT `id` FROM `user` WHERE `username` = ? AND `password` = ?");
    $sql->bind_param("ss", $name, $pass);
    $name = $username;
    $pass = $password;
    $sql->execute();
    $sql->bind_result($x);
    if ($sql->fetch() == true) {
        session_start();
        $_SESSION['state'] = 'active';
        $_SESSION['name'] = $username;
        header("Location: home.php");
    } else {
        echo "<br><font color=red><h3 align=center>Login Failed.</h3></font>";
    }
}
?>