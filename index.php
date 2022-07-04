<?php

    require_once 'm_header.php';
    if(isset($_POST['submit'])){
        require 'database.php';
        $id=$_POST['id'];
        $password=$_POST['password'];
        if(empty($id)|| empty($password)){
            echo '<script language="javascript">';
            echo 'alert("Empty input fields")';
            echo '</script>';
        }
        else{
            $password.="ewew";
            $q= "select * from employee where id = '$id' and Password = '$password'";

            $res = mysqli_query($conn,$q);
            $res1 = mysqli_num_rows($res);
        
            if ($res1 == 0) {
                echo '<script language="javascript">';
                echo 'alert("Incorrect username or password")';
                echo '</script>';
            }	
            else{
                header("Location: emp_add.php"); 
               
                session_start();
                $_SESSION['e_login'] = true;
                $_SESSION['id'] = $id;
            }
        }
        
    }
?>

<div class="container col-lg-6" >
  <h2 >Employee Login</h2>
<form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>" method="post" >
  <div class="mb-3">
    <input type="number" class="form-control" name="id"  placeholder="Enter Employee Id">
  </div>
  <div class="mb-3">
    <input type="password" class="form-control" name="password" placeholder="Enter Password">
  </div>
  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
</form>
</div>








<?php
  require_once 'footer.php';
?>