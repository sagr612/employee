<?php
    require_once 'emp_header.php';
    session_start();
    if( !$_SESSION['e_login']){
        $_SESSION['a_login']=false;
        header("Location:index.php");
        exit();
    }
    if(isset($_POST['submit'])){
        require 'database.php';
        $id = $_SESSION['id'];

        $phone=$_POST['phone'];
        $city= $_POST['city'];
        $email= $_POST['email'];
        $flag=0;
        if(!empty($phone)){
            $MyNum = (int)abs($phone);
            $MyStr = strval($MyNum);
            if(strlen($MyStr)!=10){
                $flag=1;
            }
        } 
        if(empty($phone) || empty($city) || empty($email)  ){
            echo '<script language="javascript">';
            echo 'alert("Empty input fields!!!")';
            echo '</script>';
        } 
        else if($flag==1){
            echo '<script language="javascript">';
            echo 'alert("Phone number should be of 10 digits")';
            echo '</script>';
        }
        else{
            $q1="DELETE FROM store where id='$id' ";
            $r1=mysqli_query($conn,$q1);
            
            $s="INSERT INTO store VALUES('$id','$phone','$city','$email')";
            $r=mysqli_query($conn,$s);
            echo '<script language="javascript">';
            echo 'alert("Data Added!!")';
            echo '</script>';
        }
        
    }
?>

<div class="container col-lg-6" >
  <h2>Add Employee Details</h2>
<form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>" method="post" >

  <div class="mb-3">
    <input type="number" class="form-control" name="phone" placeholder="Enter Mobile Number">
  </div>

  <div class="mb-3">
    <input type="text" class="form-control" name="city" placeholder="Enter City">
  </div>

  <div class="mb-3">
    <input type="email" class="form-control"  name="email"  placeholder="Enter Email Address">
  </div>

  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>

</form>
</div>




<?php
    require_once 'footer.php';
?>
