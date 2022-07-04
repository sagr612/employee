<?php
    require_once 'm_header.php';
     
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($username)|| empty($password)){
            echo '<script language="javascript">';
            echo 'alert("Empty input fields")';
            echo '</script>';
        }
        elseif($username=='admin' && $password=='123'){
            header("Location: add_User.php"); 
            session_start();
            $_SESSION['a_login'] = true;

        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Incorrect username or password.")';
            echo '</script>';
        }
        
    }

?> 

<div class="container col-lg-6" >
  <h2>Admin Login</h2>
<form action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>" method="post" >
  <div class="mb-3">
    <input type="text" class="form-control" name="username"  placeholder="Enter Username">
  </div>
  <div class="mb-3">
    <input type="password" class="form-control" name="password" placeholder="Enter Password">
  </div>
  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
</form>
</div>




 


<?php
    require_once 'footer.php';
?>
  