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
        $project=$_POST['project'];
        $sup=$_POST['sup'];

        if(empty($id) || empty($project) || empty($sup) ){
            echo '<script language="javascript">';
            echo 'alert("Empty input fields.")';
            echo '</script>'; 
        } 
        else {

            $sql="SELECT id FROM employee WHERE id ='$id' ";
            $result=mysqli_query($conn,$sql); 
            $rowcount=mysqli_num_rows($result);
            if($rowcount==0){
                echo '<script language="javascript">';
                echo 'alert("User not present")';
                echo '</script>';
            } else{
                $s="INSERT INTO project VALUES('$id','$project','$sup')";
                $r=mysqli_query($conn,$s);
                echo '<script language="javascript">';
                echo 'alert("Project Added")';
                echo '</script>';
            }
            
            
        }
    }
?>


<div class="container col-lg-6" >
  <h2>Assign Projects To Employee</h2>
<form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>" method="post" >

  <div class="mb-3">
    <input type="number" class="form-control" name="id" placeholder="Enter Employee Id">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control"  name="project"  placeholder="Enter Project Name">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control" name="sup" placeholder="Enter Suprevisor Name">
  </div>

  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>

</form>
</div>









<?php
    require_once 'footer.php';
?>
