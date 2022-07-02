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


<div>
    <p>Assign projects Here</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        
        <input type="number" name="id" placeholder="employee id"  >

        <input type="text" name="project" placeholder="Project Name" >

        <input type="text" name="sup" placeholder="Supervisor" >

        <button type="submit"  name="submit" >Submit</button>
    </form>
</div>



<?php
    require_once 'footer.php';
?>
