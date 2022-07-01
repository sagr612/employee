<?php
    require_once 'emp_header.php';
    session_start();
    if( !$_SESSION['e_login']){
        $_SESSION['a_login']=false;
        header("Location:index.php");
        exit();
    }
    echo $GLOBALS['eid'];
    if(isset($_POST['submit'])){
        require 'database.php';
        $id = $_SESSION['id'];

        $phone=$_POST['phone'];
        $city= $_POST['city'];
        $project= $_POST['project'];

        if(empty($phone) || empty($city) || empty($project)  ){
            echo '<script language="javascript">';
            echo 'alert("Invalid data in input fields!!!")';
            echo '</script>';
        } 
        else{
            
            $s="INSERT INTO marks VALUES('$id','$phone','$city','$project')";
            $r=mysqli_query($conn,$s);
            echo '<script language="javascript">';
            echo 'alert("Data Added!!")';
            echo '</script>';
        }
        
    }
?>


<div>
    <p>Add some Employee details </p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        
        <input type="text" name="phone" placeholder="Mobile Number" >
        
        <input type="text" name="city" placeholder="city" >
        

        <input type="text" name="project" placeholder="Project" >


        <button type="submit"  name="submit" >Submit</button>
    </form>
</div>



<?php
    require_once 'footer.php';
?>
