<?php
    require_once 'admin_header.php';
    session_start();
    if( !$_SESSION['a_login']){
        $_SESSION['e_login']=false;
        header("Location:admin.php");
        exit();
    }
?>
 
 <div class="container col-lg-6" >
  <h2>View Projects Of An Employee</h2>
<form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>" method="post" >

  <div class="mb-3">
    <input type="number" class="form-control" name="id" placeholder="Enter Employee Id">
  </div>

  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>

</form>
</div>





<?php
if(isset($_POST['submit'])){
        require 'database.php';
        $id=$_POST['id'];
    
        if( empty($id) ){
            echo '<script language="javascript">';
            echo 'alert("empty input fields")';
            echo '</script>';
        } 
        else { 
            $sql="SELECT * FROM project WHERE id ='$id' ";
            $result=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($result);
            if($rowcount==0){
                echo '<script language="javascript">';
                echo 'alert("Project Not Found!!!")';
                echo '</script>';
                
            } else{ 
                echo "<table>";
                echo "<tr><th> Employee id </th>";
                echo "<th> Project Name </th>";
                echo " <th> Project Supervisor </th>";
                echo "</tr> ";
            
                while($row1=mysqli_fetch_assoc($result)){
                    echo "<tr> ";
                    echo "<td>".$row1['id']."</td>";
                    echo "<td>".$row1['pname']."</td>";
                    echo "<td>".$row1['dep']."</td>";
                    echo "</tr>";
                    
                }
                echo "</table>";
                
            }
        }
    }
?>



<?php
    require_once 'footer.php';
?>
