<?php
session_start();
require 'dbconn.php';
?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Student update</title>
  </head>
  <body>
    <div class="container mt-5">
    <?php include('message.php')?>
		<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4> Student Edit
              <a href="index.php" class="btn btn-danger float-end">BACK</a>
          </div>
          <div class="card-body">
            <?php
                if(isset($_GET['id'])){

                    $student_id=mysqli_real_escape_string($conn,$_GET['id']);
                    $sql="select * from students where id='$student_id'";
                    $data=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($data)>0){

                        $student=mysqli_fetch_array($data);
                        ?>

                        
                             <form action="code.php" method="POST">

                             <input type="hidden" name='student_id' value="<?=$student['id'];?>">
                             <div class="mb-3">
                             <label>Student Name</label>
                             <input type="text" name="name" value="<?=$student['name'];?>" class="form-control">
                             </div>
               
                             <div class="mb-3">
                             <label>Student Email</label>
                             <input type="email" name="email" value="<?=$student['email'];?>" class="form-control">
                             </div>
               
                             <div class="mb-3">
                             <label>Student Phone no.</label>
                             <input type="text" name="phone" value="<?=$student['phone'];?>" class="form-control">
                             </div>
               
                             <div class="mb-3">
                             <label>Student Course</label>
                             <input type="text" name="course" value="<?=$student['course'];?>" class="form-control">
                             </div>
               
                             <div class="mb-3">
                               <button type="submit"  name="update_student" class="btn btn-primary">Update Student</button>
                             </div>
               
                           </form>
                           <?php
                    }
                    else{
                        echo "<h4>No ID Found</h4>";
                    }

                }
            ?>
          </div>
        </div>
      </div>
    </div>
		</div>
	</div>

   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>