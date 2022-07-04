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
  <h2>Search Department Wise</h2>
<form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>" method="post" >

  <div class="mb-3">
    <input type="text" class="form-control" name="dep" placeholder="Enter Department Name">
  </div>

  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>

</form>
</div>





 




<?php
if(isset($_POST['submit'])){
        require 'database.php';
        $dep=$_POST['dep'];
    
        if( empty($dep) ){
            echo '<script language="javascript">';
            echo 'alert("empty input fields")';
            echo '</script>';
        } 
        else { 
            $sql="SELECT * FROM employee WHERE department ='$dep' ";
            $result=mysqli_query($conn,$sql);
            $rowcount=mysqli_num_rows($result);
            if($rowcount==0){
                echo '<script language="javascript">';
                echo 'alert("Department Not Found!!!")';
                echo '</script>';
                
            } else{ 
                echo "<table>";
                echo "<tr><th> Employee id </th>";
                echo "<th> Employee Name </th>";
                echo "<th> Date of birth</th>";
                echo "<th> Father's Name</th>";
                echo " <th> Password </th>";
                echo " <th> Department </th>";
                echo "<th> Salary </th></tr> ";
            
                while($row1=mysqli_fetch_assoc($result)){
                    $l=strlen($row1['Password']);
                    $p=substr($row1['Password'],0,$l-4);
                    echo "<tr> ";
                    echo "<td>".$row1['id']."</td>";
                    echo "<td>".$row1['name']."</td>";
                    echo "<td>".$row1['DOB']."</td>";
                    echo "<td>".$row1['FatherName']."</td>";
                    echo "<td>".$p."</td>";
                    echo "<td>".$row1['department']."</td>";
                    echo "<td>".$row1['Salary']."</td>";
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
