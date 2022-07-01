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
        $username=$_POST['username'];
        $date=$_POST['dob'];
        $fname=$_POST['fname'];
        $pass=$_POST['password'];
        $salary=$_POST['salary'];
        if(empty($username) || empty($id) || empty($date) || empty($fname) || empty($pass) || empty($salary) ){
            echo '<script language="javascript">';
            echo 'alert("Invalid credentails!!!")';
            echo '</script>'; 
        } 
        else { 
            $sql="SELECT id FROM employee WHERE id ='$id' ";
            $result=mysqli_query($conn,$sql); 
            $rowcount=mysqli_num_rows($result);
            if($rowcount==0){
                $s="INSERT INTO employee VALUES('$id','$username','$date','$fname','$pass',$salary)";
                $r=mysqli_query($conn,$s);
                echo '<script language="javascript">';
                echo 'alert("User Added!!")';
                echo '</script>';
            } else{
                echo '<script language="javascript">';
                echo 'alert("User Already Present!!")';
                echo '</script>';
            }
        }
    }
?>


<div>
    <p>Add an Employee Here</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        
        <input type="number" name="id" placeholder="employee id" >

        <input type="text" name="username" placeholder="Name" >

        <input type="date" name="dob" placeholder="Date of Birth" >

        <input type="text" name="fname" placeholder="Father's Name" >

        <input type="text" name="password" placeholder="Password" >
        
        <input type="number" name="salary" placeholder="salary" >

        <button type="submit"  name="submit" >Submit</button>
    </form>
</div>



<?php
    require_once 'footer.php';
?>
