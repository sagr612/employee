<?php
    require_once 'admin_header.php';
    session_start();
    if( !$_SESSION['a_login']){
        $_SESSION['e_login']=false;
        header("Location:admin.php");
        exit();
    }
    if(isset($_POST['submit'])){
        require 'database.php';
        $id=$_POST['id'];
    
        if( empty($id) ){
            echo '<script language="javascript">';
            echo 'alert("empty input fields")';
            echo '</script>';
        } 
        else { 
            $sql="SELECT id FROM employee WHERE id ='$id' ";
            $result=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($result);
            if($rowcount==0){
                echo '<script language="javascript">';
                echo 'alert("User Not Found!!!")';
                echo '</script>';
                
            } else{ 
                $q1="DELETE FROM store where id='$id' ";
                $r1=mysqli_query($conn,$q1);
                
                
                $q3="DELETE FROM project where id='$id' ";
                $r3=mysqli_query($conn,$q3);
                
                $q2="DELETE FROM employee where id='$id' ";
                $r2=mysqli_query($conn,$q2);

                echo '<script language="javascript">';
                echo 'alert("User Deleted!!!")';
                echo '</script>';
                
            }
        }
    }
?>
<div class="container col-lg-6" >
  <h2>Delete Employee</h2>
<form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>" method="post" >

  <div class="mb-3">
    <input type="number" class="form-control" name="id" placeholder="Enter Employee Id">
  </div>
  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
</form>
</div>






<?php
    require_once 'footer.php';
?>
