<?php
    session_start();
    require 'dbconn.php';

    if(isset($_POST['delete_btn'])){
        $student_id=mysqli_real_escape_string($conn,$_POST['delete_btn']);
        $sql="delete from students where id='$student_id'";
        $data=mysqli_query($conn,$sql);

        if($data){
            $_SESSION['message'] = "Student Delete Successfully";
            header("Location:index.php");
            exit(0);
        }else{
            $_SESSION['message'] = "Student Not Deleted";
            header("Location:index.php");
            exit(0);
        }

    }

    if(isset($_POST['update_student'])){

        $student_id=mysqli_real_escape_string($conn,$_POST['student_id']);
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $phone=mysqli_real_escape_string($conn,$_POST['phone']);
        $course=mysqli_real_escape_string($conn,$_POST['course']);

        $sql="update students set  name='$name',email='$email',phone='$phone',course='$course' where id='$student_id'";
        $data=mysqli_query($conn,$sql);

        if($data){
            $_SESSION['message'] = "Student Update Successfully";
            header("Location:index.php");
            exit(0);
        }else{
            $_SESSION['message'] = "Student Not Updated";
            header("Location:index.php");
            exit(0);
        }
    }

    if(isset($_POST['save_student']))
    {
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $phone=mysqli_real_escape_string($conn,$_POST['phone']);
        $course=mysqli_real_escape_string($conn,$_POST['course']);

        $sql="insert into students (name,email,phone,course)values('$name','$email','$phone','$course')";
        $data=mysqli_query($conn,$sql);

        if($data){
            $_SESSION['message'] = "Student Create Successfully";
            header("Location:student-create.php");
            exit(0);
        }else{
            $_SESSION['message'] = "Student Not Create";
            header("Location:student-create.php");
            exit(0);
        }
    }
?>