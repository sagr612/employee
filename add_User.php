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
        $dep=$_POST['dep'];
        if(empty($username)||empty($dep) || empty($id) || empty($date) || empty($fname) || empty($pass) || empty($salary) ){
            echo '<script language="javascript">';
            echo 'alert("Empty input fields.")';
            echo '</script>'; 
        } 
        else {
            if(strlen($pass)<4){
                echo '<script language="javascript">';
                echo 'alert("Password should be of length greater than 4.")';
                echo '</script>';
            } 
            else{
                $sql="SELECT id FROM employee WHERE id ='$id' ";
                $result=mysqli_query($conn,$sql); 
                $rowcount=mysqli_num_rows($result);
                if($rowcount==0){
                    $pass.="ewew";
                    $s="INSERT INTO employee VALUES('$id','$username','$date','$fname','$pass','$salary','$dep')";
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
    }
?>

<div class="container col-lg-6" >
  <h2>Add User Here</h2>
<form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>" method="post" >

  <div class="mb-3">
    <input type="number" class="form-control" name="id" placeholder="Enter Employee Id">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control" name="username"  placeholder="Enter Employee Name">
  </div>

  <div class="mb-3">
    <input type="date" name="dob" min='1899-01-01' max='2000-01-01' class="form-control"  placeholder=" Enter date of birth">
  </div>


  <div class="mb-3">
    <input type="text" class="form-control" name="fname" placeholder="Enter Father's Name">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control" name="password" placeholder="Enter Password">
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
