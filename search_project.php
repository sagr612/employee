<?php
    require_once 'admin_header.php';
    session_start();
    if( !$_SESSION['a_login']){
        $_SESSION['e_login']=false;
        header("Location:admin.php");
        exit();
    }
?>


<div>
    <p>search project for employee</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="number" name="id" placeholder="Employee id" >
        <button type="submit"  name="submit" >Submit</button>
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
