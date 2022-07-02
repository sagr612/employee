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

<div>
    <p> Admin Login </p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        
        <input type="text" name="username" placeholder="Username" >
       
        <input type="password" name="password" placeholder="Password" >
        
        <button type="submit"  name="submit" >Submit</button>
    </form>
</div>


<?php
    require_once 'footer.php';
?>
 