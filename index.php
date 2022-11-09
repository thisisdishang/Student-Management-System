
<?php
  session_start();
  require 'dbconn.php'
?>
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Student Management System</title>
  </head>
  <body>
    <div class="container mt-5">
    <?php include('message.php')?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>
                Student Details 
                <a href="student-create.php" class="btn btn-primary float-end">Add Student</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Course</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "select * from students";
                    $data=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($data)>0){
                      
                      foreach($data as $student){
                        ?>
                        <tr>
                        <td><?= $student['id'];?></td>
                        <td><?= $student['name'];?></td>
                        <td><?= $student['email'];?></td>
                        <td><?= $student['phone'];?></td>
                        <td><?= $student['course'];?></td>
                        <td>
                        <a href="student-view.php?id=<?= $student['id'];?>" class="btn btn-info btn-sm">View</a>
                          <a href="student-update.php?id=<?= $student['id'];?>" class="btn btn-success btn-sm">Edit</a>
                         

                          <form action="code.php" method="POST" class="d-inline">

                          <button type="submit" name="delete_btn" value="<?= $student['id'];?>" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                      </tr>
                      <?php
                      }
                      
                        
                    }
                    else{
                      echo "<h4>No Record Hear</h4>";
                    }
                  ?>
                  
                </tbody>

              </table>
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