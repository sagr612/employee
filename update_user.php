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


<div>
    <p>Update Employee Info</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="number" name="id" placeholder="employe id" >
        <input type="text" name="dep" placeholder="Department" >
        <input type="number" name="salary" placeholder="salary" >
        
        <button type="submit"  name="submit" >Submit</button>
    </form>
</div>



<?php
    require_once 'footer.php';
?>
