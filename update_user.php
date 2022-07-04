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
        $salary=$_POST['salary'];
        $dep=$_POST['dep'];
        if( empty($id) || empty($salary) || empty($dep) ){
            echo '<script language="javascript">';
            echo 'alert(" empty input fields")';
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
                
                $q2="UPDATE employee SET Salary='$salary', department='$dep' where id='$id' ";
                $r2=mysqli_query($conn,$q2);
                
                echo '<script language="javascript">';
                echo 'alert("Updated!!!")';
                echo '</script>';
                
            }
        }
    } 
?>


<div class="container col-lg-6" >
  <h2>Update User Information</h2>
<form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>" method="post" >

  <div class="mb-3">
    <input type="number" class="form-control" name="id" placeholder="Enter Employee Id">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control" name="dep" placeholder="Enter Department Name">
  </div>

  <div class="mb-3">
    <input type="number" class="form-control"  name="salary"  placeholder="Enter Salary">
  </div>

  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>

</form>
</div>








<?php
    require_once 'footer.php';
?>
