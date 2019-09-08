<?php
require('config.php');
$id=$_GET['id'];
$sql='SELECT * FROM users WHERE id=:id';
$stmt=$conn->prepare($sql);
$stmt->execute([':id'=>$id]);
$users=$stmt->fetch(PDO::FETCH_OBJ);

if(isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['password'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql='UPDATE users SET name=:name,email=:email,password=:password WHERE id=:id';

    $stmt=$conn->prepare($sql);
    if($stmt->execute([ 'id'=>$id,':name'=>$name, ':email'=>$email, ':password'=>$password]))
           {
               $msg='data inserted successfully ';
           }
}

?>
<?php require('header.php');?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update users</h2>
        </div>
        <div class="card-body">
        <?php if(!empty($msg)):?>
                    <div class="alert alert-success">
                    <?= $msg; ?>
                    </div>
        <?php endif;?>

        <form method="post">
            <div class="from-group">
            <label for="name">Name</label>
            <input type="text" value="<?= $users->name?>"name="name " id="name" class="form-control">
            </div>

            <div class="from-group">
            <label for="email">Email</label>
            <input type="email" value="<?= $users->email?>"name="email " id="email" class="form-control">
            </div>

            <div class="from-group">
            <label for="password">Password</label>
            <input type="password" value="<?= $users->password?>"name="password " id="password" class="form-control">
            </div>

            <div class="form-group">
          <button type="submit" class="btn btn-info">update</button>
        </div>
        </form>

        
        </div>
    </div>
</div>

<?php require('footer.php');?>