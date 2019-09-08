<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php require('header.php');?>
<form action="signup.php" method="post">
        <div class="container register-form mt-5">
            <div class="form">
                <div class="note">
                    <p>Sign Up Page</p>
                </div>
                
                <?php if(!empty($msg)):?>
                    <div class="alert alert-success">
                    <?= $msg; ?>
                    </div>
                <?php endif;?>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name *" value="" required/>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="E-mail *" value=""required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password"  placeholder="Your Password *" value=""required/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="re_password" placeholder="Confirm Password *" value=""required/>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name ="signup"class="btnSubmit">Sign Up</button>
                    <p style="background:#c3c3c3; text-align:center"> already a member ! <a href="login.php">Sign in </a></p>
                </div>
            </div>
        </div>
    </form> 

    <?php
    session_start();
    require('config.php');
    $msg='';

    if (isset($_POST['name'])   &&  isset($_POST['email'])  &&  isset($_POST['password'])   &&  isset($_POST['re_password'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $re_password=md5($_POST['re_password']);

        if($password == $re_password)
        {
            $query="INSERT INTO users(name,email,password,role) values (:name,:email,:password,'user')";
            $stmt=$conn->prepare($query);
           if($stmt->execute([':name'=>$name, ':email'=>$email, ':password'=>$password]))
           {
               $msg='data inserted successfully ';
           }
        }
        else
        {
            echo"password does not match";

        }
    }
    // if (isset($_POST['signup'])) {
    //     require_once('config.php');
    //     # code...
    //     $name=$_POST['name'];
    //     $email=$_POST['email'];
    //     $password=md5($_POST['password']);
    //     $conf_password=md5($_POST['re_password']);
    //     $msg='';

    //     if($password == $conf_password)
    //     {
    //         $query="INSERT INTO users(name,email,password,role) values ('$name','$email','$password','user')";
    //         $conn->exec($query);
    //         $_SESSION['name']=$name;
    //         header('Location:index.php');
    //     }
    //     else
    //     {
    //         echo"password does not match";

    //     }
    // }

  



    ?>
</body>
</html>