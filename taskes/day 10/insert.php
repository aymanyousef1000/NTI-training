
<?php 
require  './helpers/dbConnection.php';
require './helpers/helpers.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    # Logic ... 
    $name     = CleanInputs($_POST['name']);
    $email    = CleanInputs($_POST['email']);
    $password = CleanInputs($_POST['password']);
    $role     =  $_POST['role_id'];

   
    # Validate Inputs ... 
    $errors = [];

    if(!validate($name,1)){
     $errors['Name'] = "Field Required.";
    }elseif(!validate($name,2)){
        $errors['Name'] = "Invalid String.";  
    }

      if(!validate($email,1)){
        $errors['Email'] = "Field Required.";
       }elseif(!validate($email,3)){
           $errors['Email'] = "Invalid Email.";  
       }


       if(!validate($password,1)){
        $errors['password'] = "Field Required.";
       }elseif(!validate($password,5)){
           $errors['password'] = "Invalid Length.";  
       }

       


    if(count($errors) > 0){

        foreach($errors as $key => $value)
        {
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{
     
     $password = md5($password);

     $sql = "insert into users (`name`,`email`,`password`,`role_id`) values ('$name','$email','$password','$role')";

     $op = mysqli_query($con,$sql);

     if($op){
      
        $user_id =  mysqli_insert_id($con);

         $sql ="insert into roles (`title`) values ('$role')";

         $op = mysqli_query($con,$sql);

           if($op){
                  echo 'Registration done';
            }else{
          echo 'error in adding address data';
            }
     }else{
         echo 'Error in Register';
       }
    }

}


// # fetch dep Data .... 
//  $sql  = "select * from users";
//  $data = mysqli_query($con,$sql);


?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>
  <form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password"   class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">role</label>
    <select name='role_id'>
      <option value='1'>user</option>
      <option value='2'>doctor</option>
    </select>
   </div>









 
  
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>



</body>
</html>