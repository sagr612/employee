<?php

    require_once 'm_header.php';
    if(isset($_POST['submit'])){
        require 'database.php';
        $id=$_POST['id'];
        $password=$_POST['password'];
        $q= "select * from employee where id = '$id' and Password = '$password'";

	    $res = mysqli_query($conn,$q);
	    $res1 = mysqli_num_rows($res);
    
        if ($res1 == 0) {
            echo '<script language="javascript">';
            echo 'alert("Incorrect username or Password")';
            echo '</script>';
        }	
        else{
            header("Location: emp_add.php"); 
           
            session_start();
            $_SESSION['e_login'] = true;
            $_SESSION['id'] = $id;
        }
        
    }
?>

<div>
    <p>employe login</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <input type="number" name="id" placeholder="Employee Id" >
        <p></p>
        <input type="password" name="password" placeholder="Password" >
        <p></p>
        <button type="submit"  name="submit" >Submit</button>
    </form>
</div>

<?php
    require_once 'footer.php';
?>
 