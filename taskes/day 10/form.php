<?php   
    require './helpers/dbConnection.php';


        
        # code...
        if ($_SERVER['REQUEST_METHOD']  == "POST") {
            $search = $_POST['search'];
            # code...
            if(!empty($search)){
                $sql = "SELECT appoinments.*, users.name , users.role_id FROM `appoinments` JOIN `users` ON appoinments.doctor_id = users.id;";
            }else{
                $sql = "SELECT appoinments.*, users.name , users.role_id FROM `appoinments` JOIN `users` ON appoinments.doctor_id = users.id;";
            }
        }else {
            # code...
            $sql = "SELECT appoinments.*, users.name , users.role_id FROM `appoinments` JOIN `users` ON appoinments.doctor_id = users.id;";
        }
        
        
      

    

    $op  =  mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html>

<head>
    <title>appoinments</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }

        .action{
            width:15%;
        }

        .id, .number{
            width:5%;
        }

        .date{
            width: 10%;
        }

        .add{
            position: absolute;
            right: 6%;
            width:15%;
        }


    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1> appoinments </h1>   
            
            <br>
            <form method="post" action="form.php" >
                <div class="form-group">
                      <label >search</label>
                      <input type="text"  name="search" class="form-control"  placeholder="search">
                </div>
                <button type="submit" class="btn btn-primary">search</button>
            </form>
        </div>

        



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th class="number">#</th>
                <th class="id">id</th>
                <th>day</th>
                <th class="action">start</th>
                <th class="action">end</th>
                <th class="action">doctor</th>
                <th class="action">role</th>



            </tr>
            

<?php 
#--- reading records
      $i = 0;
      
          # code...
     
      while ($data = mysqli_fetch_assoc($op)) {
        if ($data['role_id'] == 2) {
?>
            <tr>
               <td><?php echo ++$i;?></td>
               <td><?php echo $data['id'];?></td>
               <td><?php echo $data['day'];?></td>
               <td><?php echo $data['start'];?></td>
               <td><?php echo $data['end'];?></td>
               <td><?php echo $data['name'];?></td>
               <td><?php echo $data['role_id'];?></td>

               

                <td>
                    <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                    <!-- <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a> -->
                </td>

            </tr>

<?php }} ?>

            <!-- end table -->
        </table>
        

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->
    <div>
        <a href='insert.php' type="button" class="add btn btn-success">Add user</a>
        <br><br>
    <div>
    <br><br>
</body>

</html>