<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<?php
require('config.php');
$sql='SELECT * FROM users';
$stmt=$conn->prepare($sql);
$stmt->execute();
$users=$stmt->fetchAll(PDO::FETCH_OBJ);
?>
<?php 
session_start();
include 'header.php';?>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
             <h2>Display Users </h2>
        </div>
        <div class="card-body">
            <table class="table table-border">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                <?php foreach($users as $users): ?>
                    <tr>
                    <td><?= $users->id ?></td>
                    <td><?= $users->name?></td>
                    <td><?= $users->email?></td>
                    <td><?= $users->password?></td>
                    <td><?= $users->role?></td>
                    <td>
                        <a href="edit.php?id=<?=$users->id?>" class="btn btn-info">edit</a>
                        <a href="delete.php?id=<?=$users->id?>" class="btn btn-danger">delete</a>

                    </td>
                    </tr>
                <?php  endforeach; ?>
            </table>
        </div>
        

    </div>

</div>

<?php include 'footer.php';?>
<?php
     session_end();
     ?>  
</body>
</html>