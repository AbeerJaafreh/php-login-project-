<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>log in page </title>
</head>
<body>
<?php
    session_start();

    if (isset($_POST['submit'])) {
        require_once('config.php');
        $username=$_POST['email'];
        $password=md5($_POST['password']);


        $query="SELECT name,email,password FROM  users WHERE (email==$username) and (password==$password)";
        

        if ($query) {
            # code...
            // $q=$conn->prepare($query);
            // $result=$q->fetch_assoc();
            // echo"Done";
        
           // $_SESSION['userName']=$result["name"];
            header('Location:index.php');
        }
        else{
            echo"Invalid username or password ";
        }



    }
$conn->close();
?>

<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>



            <form class="form-signin" action="" method="post">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" 
                name="email" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" 
                name="password" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit">Sign in</button>
              
               </form>



          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
     session_end();

  ?>
</body>
</html>